<?php

declare(strict_types=1);

namespace Mysendingbox;

use Mysendingbox\Model\AddressElectronic;
use Mysendingbox\Model\AddressPaper;
use Mysendingbox\Model\Exception\AuthorizationException;
use Mysendingbox\Model\Exception\BadRequestException;
use Mysendingbox\Model\Exception\InternalErrorException;
use Mysendingbox\Model\Exception\NetworkErrorException;
use Mysendingbox\Model\Exception\ResourceNotFoundException;
use Mysendingbox\Model\Exception\TransformerException;
use Mysendingbox\Model\ReadAddressFromPdf;
use Mysendingbox\Resource\AccountResource;
use Mysendingbox\Resource\InvoiceResource;
use Mysendingbox\Resource\InvoicesRequest;
use Mysendingbox\Resource\LetterResource;
use Mysendingbox\Resource\LettersRequest;
use Mysendingbox\Transformer\AccountResourceTransformer;
use Mysendingbox\Transformer\InvoiceResourceTransformer;
use Mysendingbox\Transformer\InvoicesRequestTransformer;
use Mysendingbox\Transformer\LetterResourceTransformer;
use Mysendingbox\Transformer\LettersRequestTransformer;

final class MysendingboxClient extends MysendingboxClientBase
{
    public const POSTAGE_SPEED_EXPRESS = 'express';
    public const POSTAGE_SPEED_D = 'D';
    public const POSTAGE_SPEED_D1 = 'D1';
    public const POSTAGE_TYPE_PAPER_ECOPLI = 'ecopli';
    public const POSTAGE_TYPE_PAPER_PRIORITAIRE = 'prioritaire';
    public const POSTAGE_TYPE_PAPER_LR = 'lr';
    public const POSTAGE_TYPE_PAPER_LRAR = 'lrar';
    public const POSTAGE_TYPE_ELECTRONIC_ERE = 'ere';
    public const POSTAGE_TYPE_ELECTRONIC_LRE = 'lre';
    public const POSTAGE_TYPE_ELECTRONIC_EMAIL = 'email';
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
    public const ELECTRIC_CONTENT_TEXT = 'text';
    public const ELECTRIC_CONTENT_HTML = 'html';

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
        ?array $metadata = null
    ): LetterResource {
        $body = [
            'description' => $description,
            'to' => $to->jsonSerialize(),
            'from' => $from ? $from->jsonSerialize() : null,
            'color' => $color,
            'postage_type' => $postageType,
            'source_file' => $sourceFile,
            'source_file_type' => $sourceFileType,
            'source_file_2' => $sourceFile2,
            'source_file_2_type' => $sourceFileType2,
            'source_file_3' => $sourceFile3,
            'source_file_3_type' => $sourceFileType3,
            'source_file_4' => $sourceFile4,
            'source_file_4_type' => $sourceFileType4,
            'source_file_5' => $sourceFile5,
            'source_file_5_type' => $sourceFileType5,
            'both_sides' => $bothSides,
            'staple' => $staple,
            'send_date' => $sendDate ? $sendDate->format('Y-m-d') : null,
            'address_placement' => $addressPlacement,
            'postage_speed' => $postageSpeed,
            'pdf_margin' => $pdfMargin,
            'read_address_from_pdf' => $readAddressFromPdf ? $readAddressFromPdf->jsonSerialize() : null,
            'manage_delivery_proof' => $manageDeliveryProof,
            'manage_returned_mail' => $manageReturnedMail,
            'envelope' => $envelope,
            'envelope_window' => $envelopeWindow,
            'print_sender_address' => $printSenderAddress,
            'variables' => $variables,
            'metadata' => $metadata,
        ];

        $data = $this->request('POST', 'letters/paper', $body);

        if (!is_array($data)) {
            throw new TransformerException();
        }
        return LetterResourceTransformer::transform($data);
    }

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
    public function createElectronicLetter(
        AddressElectronic $to,
        string $postageType,
        string $sourceFile,
        string $sourceFileType,
        // Not required
        ?string $description = null,
        ?string $sourceFile2 = null,
        ?string $sourceFileType2 = null,
        ?string $sourceFile3 = null,
        ?string $sourceFileType3 = null,
        ?string $sourceFile4 = null,
        ?string $sourceFileType4 = null,
        ?string $sourceFile5 = null,
        ?string $sourceFileType5 = null,
        ?\DateTimeInterface $sendDate = null,
        ?string $content = null,
        ?string $contentType = null,
        ?string $replyTo = null,
        ?array $variables = null,
        ?array $metadata = null
    ): LetterResource {
        $body = [
            'description' => $description,
            'to' => $to->jsonSerialize(),
            'postage_type' => $postageType,
            'source_file' => $sourceFile,
            'source_file_type' => $sourceFileType,
            'source_file_2' => $sourceFile2,
            'source_file_2_type' => $sourceFileType2,
            'source_file_3' => $sourceFile3,
            'source_file_3_type' => $sourceFileType3,
            'source_file_4' => $sourceFile4,
            'source_file_4_type' => $sourceFileType4,
            'source_file_5' => $sourceFile5,
            'source_file_5_type' => $sourceFileType5,
            'send_date' => $sendDate ? $sendDate->format('Y-m-d') : null,
            'content' => $content,
            'content_type' => $contentType,
            'from' => $replyTo ? ['reply_to' => $replyTo] : null,
            'variables' => $variables,
            'metadata' => $metadata,
        ];

        $data = $this->request('POST', 'letters/electronic', $body);

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
            throw new TransformerException('response', 'array', $data);
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
            throw new TransformerException('response', 'array', $data);
        }

        return LettersRequestTransformer::transform($data);
    }

    /**
     * @throws AuthorizationException
     * @throws BadRequestException
     * @throws InternalErrorException
     * @throws NetworkErrorException
     * @throws ResourceNotFoundException
     * @throws TransformerException
     */
    public function createAccount(
        string $email,
        string $name,
        ?string $phone = null,
        ?string $webhookUrl = null,
        ?string $companyName = null,
        ?string $addressLine1 = null,
        ?string $addressLine2 = null,
        ?string $addressPostalcode = null,
        ?string $addressCity = null,
        ?string $addressCountry = null,
        ?string $siren = null,
        ?int $cancellationWindow = null
    ): AccountResource {
        $body = [
            'email' => $email,
            'name' => $name,
            'phone' => $phone,
            'webhook_url' => $webhookUrl,
            'company_name' => $companyName,
            'address_line1' => $addressLine1,
            'address_line2' => $addressLine2,
            'address_postalcode' => $addressPostalcode,
            'address_city' => $addressCity,
            'address_country' => $addressCountry,
            'siren' => $siren,
            'cancellation_window' => $cancellationWindow,
        ];

        $data = $this->request('POST', 'accounts', $body, 'json');

        if (!is_array($data)) {
            throw new TransformerException();
        }
        return AccountResourceTransformer::transform($data);
    }

    /**
     * @throws AuthorizationException
     * @throws BadRequestException
     * @throws InternalErrorException
     * @throws NetworkErrorException
     * @throws ResourceNotFoundException
     * @throws TransformerException
     */
    public function updateAccount(
        string $accountId,
        string $email
    ): bool {
        $body = [
            'email' => $email,
        ];

        $this->request('PUT', sprintf('accounts/%s', $accountId), $body, 'json');

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
    public function getAllInvoices(array $query = []): InvoicesRequest
    {
        $data = $this->request('GET', 'invoices', $query);

        if (!is_array($data)) {
            throw new TransformerException('response', 'array', $data);
        }

        return InvoicesRequestTransformer::transform($data);
    }

    /**
     * @throws AuthorizationException
     * @throws BadRequestException
     * @throws InternalErrorException
     * @throws NetworkErrorException
     * @throws ResourceNotFoundException
     * @throws TransformerException
     */
    public function getInvoice(string $id): InvoiceResource
    {
        $data = $this->request('GET', sprintf('invoices/%s', $id));

        if (!is_array($data)) {
            throw new TransformerException('response', 'array', $data);
        }
        return InvoiceResourceTransformer::transform($data);
    }
}
