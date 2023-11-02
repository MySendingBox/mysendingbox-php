<?php

declare(strict_types=1);

namespace Mysendingbox;

use Mysendingbox\Model\AddressPaper;
use Mysendingbox\Model\Exception\AuthorizationException;
use Mysendingbox\Model\Exception\InternalErrorException;
use Mysendingbox\Model\Exception\NetworkErrorException;
use Mysendingbox\Model\Exception\ResourceNotFoundException;
use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Model\ReadAddressFromPdf;
use Mysendingbox\Resource\LetterResource;
use Mysendingbox\Transformer\LetterResourceTransformer;

class MysendingboxClient extends MysendingboxClientBase
{
    public function __construct(
        string $apiKey,
        ?string $version = null,
        string $apiUrl = 'https://api.mysendingbox.com/',
        int $timeout = 60,
        bool $verifySsl = true,
    ) {
        parent::__construct($apiKey, $version, $apiUrl, $timeout, $verifySsl);
    }

    /**
     * @throws InternalErrorException
     * @throws ResourceNotFoundException
     * @throws NetworkErrorException
     * @throws AuthorizationException
     * @throws TransformerException
     */
    public function getLetter(string $id): LetterResource
    {
        $data = $this->request('GET', sprintf('letters/%s', $id));

        if (!is_array($data)) {
            throw new TransformerException();
        }
        return LetterResourceTransformer::transform($data);
    }
}
