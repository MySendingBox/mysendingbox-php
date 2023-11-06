<?php

declare(strict_types=1);

namespace Mysendingbox;

use Mysendingbox\Model\AddressPaper;
use Mysendingbox\Model\Exception\AuthorizationException;
use Mysendingbox\Model\Exception\BadRequestException;
use Mysendingbox\Model\Exception\InternalErrorException;
use Mysendingbox\Model\Exception\NetworkErrorException;
use Mysendingbox\Model\Exception\ResourceNotFoundException;
use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Model\ReadAddressFromPdf;
use Mysendingbox\Resource\LetterResource;
use Mysendingbox\Resource\LettersRequest;
use Mysendingbox\Transformer\LetterResourceTransformer;
use Mysendingbox\Transformer\LettersRequestTransformer;

final class MysendingboxClient extends MysendingboxClientBase
{
    public const POSTAGE_SPEED_EXPRESS = 'express';
    public const POSTAGE_SPEED_D = 'D';
    public const POSTAGE_SPEED_D1 = 'D1';
    public const POSTAGE_TYPE_ECOPLI = 'ecopli';
    public const POSTAGE_TYPE_PRIORITAIRE = 'prioritaire';
    public const POSTAGE_TYPE_LR = 'lr';
    public const POSTAGE_TYPE_LRAR = 'lrar';
    public const ELECTRONIC_STATUS_INDIVIDUAL = 'individual';
    public const ELECTRONIC_STATUS_PROFESSIONAL = 'professional';
    public const COLOR_BW = 'bw';
    public const COLOR_COLOR = 'color';
    public const SOURCE_FILE_TYPE_FILE = 'file';
    public const SOURCE_FILE_TYPE_TEMPLATE_ID = 'template_id';
    public const SOURCE_FILE_TYPE_REMOTE = 'remote';
    public const SOURCE_FILE_TYPE_HTML = 'html';
    public const ADDRESS_PLACEMENT_FIRST_PAGE = 'first_page';
    public const ADDRESS_PLACEMENT_INSERT_BLANK_PAGE = 'insert_blank_page';
    public const ENVELOPE_C4 = 'c4';
    public const ENVELOPE_C6 = 'c6';
    public const ENVELOPE_WINDOW_SIMPLE = 'simple';
    public const ENVELOPE_WINDOW_DOUBLE = 'double';

    /**
     * @param array<string, mixed> $variables
     * @param array<string, mixed> $metadata
     *
     * @throws AuthorizationException
     * @throws BadRequestException
     * @throws InternalErrorException
     * @throws NetworkErrorException
     * @throws ResourceNotFoundException
     * @throws TransformerException
     */
    public function createPaperLetter(
        AddressPaper $to,
        string $color,
        string $postageType,
        string $sourceFile,
        string $sourceFileType,
        // Not required
        ?string $description = null,
        ?AddressPaper $from = null,
        ?string $sourceFile2 = null,
        ?string $sourceFileType2 = null,
        ?string $sourceFile3 = null,
        ?string $sourceFileType3 = null,
        ?string $sourceFile4 = null,
        ?string $sourceFileType4 = null,
        ?string $sourceFile5 = null,
        ?string $sourceFileType5 = null,
        ?bool $bothSides = null,
        ?bool $staple = null,
        ?\DateTimeInterface $sendDate = null,
        ?string $addressPlacement = null,
        ?string $postageSpeed = null,
        ?int $pdfMargin = null,
        ?ReadAddressFromPdf $readAddressFromPdf = null,
        ?bool $manageDeliveryProof = null,
        ?bool $manageReturnedMail = null,
        ?string $envelope = null,
        ?string $envelopeWindow = null,
        ?bool $printSenderAddress = null,
        ?array $variables = null,
        ?array $metadata = null,
    ): LetterResource {
        $body = [];
        $body['description'] = $description;
        $body['to'] = $to->jsonSerialize();
        $body['from'] = $from?->jsonSerialize();
        $body['color'] = $color;
        $body['postage_type'] = $postageType;
        $body['source_file'] = $sourceFile;
        $body['source_file_type'] = $sourceFileType;
        $body['source_file_2'] = $sourceFile2;
        $body['source_file_2_type'] = $sourceFileType2;
        $body['source_file_3'] = $sourceFile3;
        $body['source_file_3_type'] = $sourceFileType3;
        $body['source_file_4'] = $sourceFile4;
        $body['source_file_4_type'] = $sourceFileType4;
        $body['source_file_5'] = $sourceFile5;
        $body['source_file_5_type'] = $sourceFileType5;
        $body['both_sides'] = $bothSides;
        $body['staple'] = $staple;
        $body['send_date'] = $sendDate?->format('Y-m-d');
        $body['address_placement'] = $addressPlacement;
        $body['postage_speed'] = $postageSpeed;
        $body['pdf_margin'] = $pdfMargin;
        $body['read_address_from_pdf'] = $readAddressFromPdf?->jsonSerialize();
        $body['manage_delivery_proof'] = $manageDeliveryProof;
        $body['manage_returned_mail'] = $manageReturnedMail;
        $body['envelope'] = $envelope;
        $body['envelope_window'] = $envelopeWindow;
        $body['print_s  ender_address'] = $printSenderAddress;
        $body['variables'] = $variables;
        $body['metadata'] = $metadata;

        $data = $this->request('POST', 'letters', $body);

        if (!is_array($data)) {
            throw new TransformerException();
        }
        return LetterResourceTransformer::transform($data);
    }

    /**
     * @throws AuthorizationException
     * @throws BadRequestException
     * @throws InternalErrorException
     * @throws NetworkErrorException
     * @throws ResourceNotFoundException
     * @throws TransformerException
     */
    public function getLetter(string $id): LetterResource
    {
        $data = $this->request('GET', sprintf('letters/%s', $id));

        if (!is_array($data)) {
            throw new TransformerException(expected: 'array', value: $data);
        }
        return LetterResourceTransformer::transform($data);
    }

    /**
     * @return true If letter has been cancelled or throw bad request otherwise
     *
     * @throws AuthorizationException
     * @throws BadRequestException
     * @throws InternalErrorException
     * @throws NetworkErrorException
     * @throws ResourceNotFoundException
     */
    public function cancelLetter(string $id): bool
    {
        $this->request('DELETE', sprintf('letters/%s', $id));

        return true;
    }

    /**
     * @param array<string, mixed> $query
     *
     * @throws AuthorizationException
     * @throws BadRequestException
     * @throws InternalErrorException
     * @throws NetworkErrorException
     * @throws ResourceNotFoundException
     * @throws TransformerException
     */
    public function getAllLetters(array $query = []): LettersRequest
    {
        $data = $this->request('GET', 'letters', $query);

        if (!is_array($data)) {
            throw new TransformerException(expected: 'array', value: $data);
        }

        return LettersRequestTransformer::transform($data);
    }
}
