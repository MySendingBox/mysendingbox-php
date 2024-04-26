<?php

declare(strict_types=1);

namespace Mysendingbox\Transformer;

use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Resource\AddressResource;
use Mysendingbox\Resource\CompanyResource;
use Mysendingbox\Resource\EventResource;
use Mysendingbox\Resource\FileResource;
use Mysendingbox\Resource\PriceResource;
use Mysendingbox\Resource\TrackingEventResource;
use Mysendingbox\Resource\UserResource;

abstract class AbstractTransformer
{
    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function getAsBool(array $data, string $key): bool
    {
        if (!array_key_exists($key, $data) || !is_bool($data[$key])) {
            throw new TransformerException($key, 'bool', $data[$key] ?? null);
        }

        return $data[$key];
    }

    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function getAsBoolOrNull(array $data, string $key): ?bool
    {
        if (!array_key_exists($key, $data) || is_null($data[$key])) {
            return null;
        }
        if (!is_bool($data[$key])) {
            throw new TransformerException($key, 'bool|null', $data[$key]);
        }

        return $data[$key];
    }

    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function getAsString(array $data, string $key): string
    {
        if (!array_key_exists($key, $data) || !is_string($data[$key])) {
            throw new TransformerException($key, 'string', $data[$key] ?? null);
        }

        return $data[$key];
    }

    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function getAsStringOrNull(array $data, string $key): ?string
    {
        if (!array_key_exists($key, $data) || is_null($data[$key])) {
            return null;
        }
        if (!is_string($data[$key])) {
            throw new TransformerException($key, 'string|null', $data[$key]);
        }

        return $data[$key];
    }

    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function getAsInt(array $data, string $key): int
    {
        if (!array_key_exists($key, $data) || !is_int($data[$key])) {
            throw new TransformerException($key, 'int', $data[$key] ?? null);
        }

        return $data[$key];
    }

    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function getAsIntOrNull(array $data, string $key): ?int
    {
        if (!array_key_exists($key, $data) || is_null($data[$key])) {
            return null;
        }
        if (!is_int($data[$key])) {
            throw new TransformerException($key, 'int|null', $data[$key]);
        }

        return $data[$key];
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return int|float
     *
     * @throws TransformerException
     */
    public static function getAsNumber(array $data, string $key)
    {
        if (!array_key_exists($key, $data) || (!is_int($data[$key]) && !is_float($data[$key]))) {
            throw new TransformerException($key, 'int|float', $data[$key] ?? null);
        }

        return $data[$key];
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return array<string>
     *
     * @throws TransformerException
     */
    public static function getAsArray(array $data, string $key): array
    {
        if (!array_key_exists($key, $data) || !is_array($data[$key])) {
            throw new TransformerException($key, 'array', $data[$key] ?? null);
        }

        return $data[$key];
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return array<string, mixed>
     *
     * @throws TransformerException
     */
    public static function getAsObject(array $data, string $key): array
    {
        if (!array_key_exists($key, $data) || !is_array($data[$key])) {
            throw new TransformerException($key, 'array', $data[$key] ?? null);
        }

        return $data[$key];
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return array<string, mixed>|null
     *
     * @throws TransformerException
     */
    public static function getAsObjectOrNull(array $data, string $key): ?array
    {
        if (!array_key_exists($key, $data) || is_null($data[$key])) {
            return null;
        }
        if (!is_array($data[$key])) {
            throw new TransformerException($key, 'array|null', $data[$key]);
        }

        return $data[$key];
    }

    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function getAsAddressResource(array $data, string $key): AddressResource
    {
        if (!array_key_exists($key, $data) || !is_array($data[$key])) {
            throw new TransformerException($key, 'array', $data[$key] ?? null);
        }

        return AddressResourceTransformer::transform($data[$key]);
    }

    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function getAsAddressResourceOrNull(array $data, string $key): ?AddressResource
    {
        if (!array_key_exists($key, $data) || is_null($data[$key])) {
            return null;
        }
        if (!is_array($data[$key])) {
            throw new TransformerException($key, 'array|null', $data[$key]);
        }

        return AddressResourceTransformer::transform($data[$key]);
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return FileResource|string|null
     *
     * @throws TransformerException
     */
    public static function getAsFileResourceOrNull(array $data, string $key)
    {
        if (!array_key_exists($key, $data) || is_null($data[$key])) {
            return null;
        }
        if (is_string($data[$key])) {
            return $data[$key];
        }
        if (!is_array($data[$key])) {
            throw new TransformerException($key, 'array|null', $data[$key]);
        }

        return FileResourceTransformer::transform($data[$key]);
    }

    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function getAsPriceResource(array $data, string $key): PriceResource
    {
        if (!array_key_exists($key, $data) || !is_array($data[$key])) {
            throw new TransformerException($key, 'array', $data[$key] ?? null);
        }

        return PriceResourceTransformer::transform($data[$key]);
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return array<TrackingEventResource>
     *
     * @throws TransformerException
     */
    public static function getAsTrackingEventResourceArray(array $data, string $key): array
    {
        if (!array_key_exists($key, $data) || !is_array($data[$key])) {
            throw new TransformerException($key, 'array', $data[$key] ?? null);
        }

        $result = [];
        foreach ($data[$key] as $index => $datum) {
            if (!is_array($datum)) {
                throw new TransformerException($key.'['.$index.']', 'array', $datum ?? null);
            }

            $result[] = TrackingEventTransformer::transform($datum);
        }

        return $result;
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return array<EventResource>
     *
     * @throws TransformerException
     */
    public static function getAsEventResourceArray(array $data, string $key): array
    {
        if (!array_key_exists($key, $data) || !is_array($data[$key])) {
            throw new TransformerException($key, 'array', $data[$key] ?? null);
        }

        $result = [];
        foreach ($data[$key] as $index => $datum) {
            if (!is_array($datum)) {
                throw new TransformerException($key.'['.$index.']', 'array', $datum ?? null);
            }

            $result[] = EventTransformer::transform($datum);
        }

        return $result;
    }

    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function getAsUserResource(array $data, string $key): UserResource
    {
        if (!array_key_exists($key, $data) || !is_array($data[$key])) {
            throw new TransformerException($key, 'array', $data[$key] ?? null);
        }

        return UserResourceTransformer::transform($data[$key]);
    }

    /**
     * @param array<string, mixed> $data
     *
     * @throws TransformerException
     */
    public static function getAsCompanyResource(array $data, string $key): CompanyResource
    {
        if (!array_key_exists($key, $data) || !is_array($data[$key])) {
            throw new TransformerException($key, 'array', $data[$key] ?? null);
        }

        return CompanyResourceTransformer::transform($data[$key]);
    }
}
