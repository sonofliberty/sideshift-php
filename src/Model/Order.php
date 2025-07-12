<?php

namespace SonOfLiberty\SideShift\Model;

use JMS\Serializer\Annotation as Serializer;
use SonOfLiberty\SideShift\Model\Order\Deposit;

class Order
{
    private string $id;

    #[Serializer\Type("DateTime<'Y-m-d\TH:i:s.vP'>")]
    #[Serializer\SerializedName("createdAtISO")]
    private \DateTime $createdAt;

    #[Serializer\Type("DateTime<'Y-m-d\TH:i:s.vP'>")]
    #[Serializer\SerializedName("expiresAtISO")]
    private \DateTime $expiresAt;

    #[Serializer\Type("array<string, string>")]
    private array $depositAddress;

    #[Serializer\Type("array<string, string>")]
    private array $settleAddress;

    private float $depositMin;

    private float $depositMax;

    #[Serializer\Type("array<SonOfLiberty\SideShift\Model\Order\Deposit>")]
    private array $deposits;

    private ?string $quoteId;

    private ?float $estimatedNetworkFeeUsd;

    private ?float $depositAmount = null;

    private ?float $settleAmount = null;

    public function getId(): string
    {
        return $this->id;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getExpiresAt(): \DateTime
    {
        return $this->expiresAt;
    }

    public function getDepositAddress(): array
    {
        return $this->depositAddress;
    }

    public function getSettleAddress(): array
    {
        return $this->settleAddress;
    }

    public function getDepositMin(): float
    {
        return $this->depositMin;
    }

    public function getDepositMax(): float
    {
        return $this->depositMax;
    }

    /**
     * @return Deposit[]
     */
    public function getDeposits(): array
    {
        return $this->deposits;
    }

    public function getQuoteId(): ?string
    {
        return $this->quoteId;
    }

    public function getEstimatedNetworkFeeUsd(): ?float
    {
        return $this->estimatedNetworkFeeUsd;
    }

    public function getDepositAmount(): ?float
    {
        return $this->depositAmount;
    }

    public function getSettleAmount(): ?float
    {
        return $this->settleAmount;
    }
}
