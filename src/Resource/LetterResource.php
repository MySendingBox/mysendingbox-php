<?php

declare(strict_types=1);

namespace Mysendingbox\Resource;

final class LetterResource
{
    private string $id;
    private string $channel;
    private PriceResource $price;
    private ?AddressResource $from;
    private AddressResource $to;
    private int $pageCount;
    private int $sheetCount;
    /**
     * @var FileResource|string|null
     */
    private $fileResource;
    private ?string $sourceFiletype;
    private string $mode;
    private string $color;
    private bool $bothSides;
    private string $postageType;
    private string $postageSpeed;
    private ?int $pdfMargin;
    private bool $manageDeliveryProof;
    private bool $manageReturnedMail;
    private string $envelopeWindow;
    private string $mailProvider;
    private bool $printSenderAddress;
    private string $addressPlacement;
    private string $envelope;
    private bool $staple;
    private string $sendDate;
    /**
     * @var FileResource|string|null
     */
    private $deliveryProof;
    /**
     * @var FileResource|string|null
     */
    private $filingProof;
    /**
     * @var FileResource|string|null
     */
    private $lostProof;
    /**
     * @var FileResource|string|null
     */
    private $returnToSenderProof;
    /**
     * @var FileResource|string|null
     */
    private $downloadProof;
    /**
     * @var FileResource|string|null
     */
    private $rejectionProof;
    /**
     * @var FileResource|string|null
     */
    private $negligenceProof;
    /**
     * @var array<TrackingEventResource>
     */
    private array $trackingEvents;
    private ?string $trackingNumber;
    /**
     * @var array<EventResource>
     */
    private array $events;
    private string $createdAt;
    private string $deletedAt;
    private string $user;
    private ?bool $error;
    private ?bool $wrongAddress;
    private string $createdFrom;
    private string $object;
    private ?string $description;
    private ?string $content;
    private ?string $contentType;
    private ?bool $termOfUseValidation;
    /**
     * @var array<string, mixed>|null
     */
    private ?array $metadata;
    /**
     * @var array<string, mixed>|null
     */
    private ?array $variables;

    /**
     * @param array<TrackingEventResource> $trackingEvents
     * @param array<EventResource> $events
     * @param array<string, mixed>|null $metadata
     * @param array<string, mixed>|null $variables
     * @param FileResource|string|null $fileResource
     * @param FileResource|string|null $deliveryProof
     * @param FileResource|string|null $filingProof
     * @param FileResource|string|null $lostProof
     * @param FileResource|string|null $returnToSenderProof
     * @param FileResource|string|null $downloadProof
     * @param FileResource|string|null $rejectionProof
     * @param FileResource|string|null $negligenceProof
     */
    public function __construct(
        string $id,
        string $channel,
        PriceResource $price,
        ?AddressResource $from,
        AddressResource $to,
        int $pageCount,
        int $sheetCount,
        $fileResource,
        ?string $sourceFiletype,
        string $mode,
        string $color,
        bool $bothSides,
        string $postageType,
        string $postageSpeed,
        ?int $pdfMargin,
        bool $manageDeliveryProof,
        bool $manageReturnedMail,
        string $envelopeWindow,
        string $mailProvider,
        bool $printSenderAddress,
        string $addressPlacement,
        string $envelope,
        bool $staple,
        string $sendDate,
        $deliveryProof,
        $filingProof,
        $lostProof,
        $returnToSenderProof,
        $downloadProof,
        $rejectionProof,
        $negligenceProof,
        array $trackingEvents,
        ?string $trackingNumber,
        array $events,
        string $createdAt,
        string $deletedAt,
        string $user,
        ?bool $error,
        ?bool $wrongAddress,
        string $createdFrom,
        string $object,
        ?string $description,
        ?string $content,
        ?string $contentType,
        ?bool $termOfUseValidation,
        ?array $metadata,
        ?array $variables
    ) {
        $this->variables = $variables;
        $this->metadata = $metadata;
        $this->termOfUseValidation = $termOfUseValidation;
        $this->contentType = $contentType;
        $this->content = $content;
        $this->description = $description;
        $this->object = $object;
        $this->createdFrom = $createdFrom;
        $this->wrongAddress = $wrongAddress;
        $this->error = $error;
        $this->user = $user;
        $this->deletedAt = $deletedAt;
        $this->createdAt = $createdAt;
        $this->events = $events;
        $this->trackingNumber = $trackingNumber;
        $this->trackingEvents = $trackingEvents;
        $this->negligenceProof = $negligenceProof;
        $this->rejectionProof = $rejectionProof;
        $this->downloadProof = $downloadProof;
        $this->returnToSenderProof = $returnToSenderProof;
        $this->lostProof = $lostProof;
        $this->filingProof = $filingProof;
        $this->deliveryProof = $deliveryProof;
        $this->sendDate = $sendDate;
        $this->staple = $staple;
        $this->envelope = $envelope;
        $this->addressPlacement = $addressPlacement;
        $this->printSenderAddress = $printSenderAddress;
        $this->mailProvider = $mailProvider;
        $this->envelopeWindow = $envelopeWindow;
        $this->manageReturnedMail = $manageReturnedMail;
        $this->manageDeliveryProof = $manageDeliveryProof;
        $this->pdfMargin = $pdfMargin;
        $this->postageSpeed = $postageSpeed;
        $this->postageType = $postageType;
        $this->bothSides = $bothSides;
        $this->color = $color;
        $this->mode = $mode;
        $this->sourceFiletype = $sourceFiletype;
        $this->fileResource = $fileResource;
        $this->sheetCount = $sheetCount;
        $this->pageCount = $pageCount;
        $this->to = $to;
        $this->from = $from;
        $this->price = $price;
        $this->channel = $channel;
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function getPrice(): PriceResource
    {
        return $this->price;
    }

    public function getFrom(): ?AddressResource
    {
        return $this->from;
    }

    public function getTo(): AddressResource
    {
        return $this->to;
    }

    public function getPageCount(): int
    {
        return $this->pageCount;
    }

    public function getSheetCount(): int
    {
        return $this->sheetCount;
    }

    /**
     * @return FileResource|string|null
     */
    public function getFileResource()
    {
        return $this->fileResource;
    }

    public function getSourceFiletype(): ?string
    {
        return $this->sourceFiletype;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function isBothSides(): bool
    {
        return $this->bothSides;
    }

    public function getPostageType(): string
    {
        return $this->postageType;
    }

    public function getPostageSpeed(): string
    {
        return $this->postageSpeed;
    }

    public function getPdfMargin(): ?int
    {
        return $this->pdfMargin;
    }

    public function isManageDeliveryProof(): bool
    {
        return $this->manageDeliveryProof;
    }

    public function isManageReturnedMail(): bool
    {
        return $this->manageReturnedMail;
    }

    public function getEnvelopeWindow(): string
    {
        return $this->envelopeWindow;
    }

    public function getMailProvider(): string
    {
        return $this->mailProvider;
    }

    public function isPrintSenderAddress(): bool
    {
        return $this->printSenderAddress;
    }

    public function getAddressPlacement(): string
    {
        return $this->addressPlacement;
    }

    public function getEnvelope(): string
    {
        return $this->envelope;
    }

    public function getStaple(): bool
    {
        return $this->staple;
    }

    public function getSendDate(): string
    {
        return $this->sendDate;
    }

    /**
     * @return FileResource|string|null
     */
    public function getDeliveryProof()
    {
        return $this->deliveryProof;
    }

    /**
     * @return FileResource|string|null
     */
    public function getFilingProof()
    {
        return $this->filingProof;
    }

    /**
     * @return FileResource|string|null
     */
    public function getLostProof()
    {
        return $this->lostProof;
    }

    /**
     * @return FileResource|string|null
     */
    public function getReturnToSenderProof()
    {
        return $this->returnToSenderProof;
    }

    /**
     * @return FileResource|string|null
     */
    public function getDownloadProof()
    {
        return $this->downloadProof;
    }

    /**
     * @return FileResource|string|null
     */
    public function getRejectionProof()
    {
        return $this->rejectionProof;
    }

    /**
     * @return FileResource|string|null
     */
    public function getNegligenceProof()
    {
        return $this->negligenceProof;
    }

    /**
     * @return array<TrackingEventResource>
     */
    public function getTrackingEvents(): array
    {
        return $this->trackingEvents;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    /**
     * @return array<EventResource>
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getDeletedAt(): string
    {
        return $this->deletedAt;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function isError(): ?bool
    {
        return $this->error;
    }

    public function isWrongAddress(): ?bool
    {
        return $this->wrongAddress;
    }

    public function getCreatedFrom(): string
    {
        return $this->createdFrom;
    }

    public function getObject(): string
    {
        return $this->object;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    public function isTermOfUseValidation(): ?bool
    {
        return $this->termOfUseValidation;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getVariables(): ?array
    {
        return $this->variables;
    }
}
