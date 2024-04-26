<?php

declare(strict_types=1);

namespace Mysendingbox;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7;
use GuzzleHttp\RequestOptions;
use InvalidArgumentException;
use Mysendingbox\Model\Exception\AuthorizationException;
use Mysendingbox\Model\Exception\BadRequestException;
use Mysendingbox\Model\Exception\InternalErrorException;
use Mysendingbox\Model\Exception\NetworkErrorException;
use Mysendingbox\Model\Exception\ResourceNotFoundException;
use Psr\Http\Message\ResponseInterface;

abstract class MysendingboxClientBase
{
    public const CLIENT_VERSION = '1.0.0';

    protected ?Client $client = null;
    private string $apiKey;
    private ?string $version = null;
    private string $apiUrl = 'https://api.mysendingbox.fr/';
    private int $timeout = 60;
    private bool $verifySsl = true;

    public function __construct(
        string $apiKey,
        ?string $version = null,
        string $apiUrl = 'https://api.mysendingbox.fr/',
        int $timeout = 60,
        bool $verifySsl = true
    ) {
        $this->verifySsl = $verifySsl;
        $this->timeout = $timeout;
        $this->apiUrl = $apiUrl;
        $this->version = $version;
        $this->apiKey = $apiKey;
        if ($this->apiKey === '') {
            throw new InvalidArgumentException('API Key must be a non-empty string.');
        }
    }

    protected function getClient(): Client
    {
        if (!$this->client) {
            $this->client = new Client([
                RequestOptions::VERIFY => $this->verifySsl,
                RequestOptions::TIMEOUT => $this->timeout,
                'base_uri' => $this->apiUrl,
            ]);
        }

        return $this->client;
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return array<string, mixed>
     */
    protected function clearNullValuesRecursively(array $data): array
    {
        foreach ($data as $key => $value) {
            if ($value === null) {
                unset($data[$key]);
                continue;
            }

            if (\is_array($value)) {
                $data[$key] = $this->clearNullValuesRecursively($value);
            }
        }

        return $data;
    }

    /**
     * @param array<string, mixed> $body
     *
     * @return mixed
     */
    protected function request(
        string $method,
        string $path,
        ?array $body = null,
        string $serialization = RequestOptions::MULTIPART
    ) {
        $client = $this->getClient();

        $options = [
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::HEADERS => [
                'Accept' => 'application/json; charset=utf-8',
                'User-Agent' => 'Mysendingbox/v1 PhpBindings/' . self::CLIENT_VERSION,
            ],
            RequestOptions::AUTH => [$this->apiKey, ''],
        ];

        if ($this->version) {
            $options[RequestOptions::HEADERS]['Mysendingbox-Version'] = $this->version;
        }

        if (is_array($body) && count($body) !== 0) {
            $cleanParams = $this->clearNullValuesRecursively($body);

            switch ($method) {
                case 'GET':
                case 'HEAD':
                case 'DELETE':
                case 'OPTIONS':
                    $options[RequestOptions::QUERY] = $cleanParams;
                    break;
                case 'PUT':
                case 'POST':
                case 'PATCH':
                    switch ($serialization) {
                        case RequestOptions::MULTIPART:
                            $options[RequestOptions::MULTIPART] = self::formatMultipartData($cleanParams);
                            break;
                        case RequestOptions::JSON:
                            $options[RequestOptions::JSON] = $cleanParams;
                            break;
                        default:
                            throw new BadRequestException('Unsupported serialization method');
                    }
                    break;
            }
        }

        $previous = null;
        try {
            $response = $client->request($method, $path, $options);
        } catch (BadResponseException $e) {
            $previous = $e;
            $response = $e->getResponse();
        } catch (GuzzleException $e) {
            throw new NetworkErrorException($e->getMessage());
        }
        $responseErrorBody = self::getErrorFromJsonBody($response);

        switch ($response->getStatusCode()) {
            case 200:
                return json_decode($response->getBody()->__toString(), true);
            case 400:
                throw new BadRequestException($responseErrorBody, 400, $previous);
            case 401:
                throw new AuthorizationException('Unauthorized', 401, $previous);
            case 403:
                throw new AuthorizationException($responseErrorBody, 403, $previous);
            case 422:
                if ($method !== 'GET') {
                    throw new ResourceNotFoundException($responseErrorBody, 422, $previous);
                }
                // no break 422 on GET is a not found
            case 404:
                throw new ResourceNotFoundException($responseErrorBody, 404, $previous);
            default:
                throw new InternalErrorException(
                    'Unexpected error code from API : '.$responseErrorBody,
                    $response->getStatusCode(),
                    $previous
                );
        }
    }

    /**
     * @param array<string, mixed> $body
     *
     * @return array<string, mixed>
     */
    protected static function flattenArray(array $body, string $prefix = ''): array
    {
        $newBody = [];
        foreach ($body as $key => $value) {
            $flattenedKey = !strlen($prefix) ? $key : "{$prefix}[{$key}]";
            if (is_array($value)) {
                $newBody += self::flattenArray($value, $flattenedKey);
                continue;
            }

            $newBody[$flattenedKey] = $value;
        }

        return $newBody;
    }

    /**
     * @param array<string, mixed> $body
     *
     * @return array<array<string, mixed>>
     */
    protected static function formatMultipartData(array $body): array
    {
        $multipartData = [];

        foreach (self::flattenArray($body) as $key => $value) {
            $field = ['name' => $key, 'contents' => $value];

            if ((is_string($value) && strpos($value, '@') === 0)) {
                $filename = substr($value, 1);
                $field['contents'] = Psr7\Utils::tryFopen($filename, 'r');
            }

            $multipartData[] = $field;
        }

        return $multipartData;
    }

    protected static function getErrorFromJsonBody(ResponseInterface $body): string
    {
        $response = json_decode($body->getBody()->getContents(), true);
        if (is_array($response)
            && array_key_exists('error', $response)
            && array_key_exists('message', $response['error'])) {
            return $response['error']['message'];
        }

        return 'An Internal Error has occurred';
    }
}
