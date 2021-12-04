<?php

namespace SonOfLiberty\SideShift\Model;

use JMS\Serializer\Annotation as Serializer;

class Quote
{
    private ?string $id = null;
    /**
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.vP'>")
     */
    private ?\DateTime $createdAt = null;
    private ?float $depositAmount = null;
    private ?string $depositMethod = null;
    /**
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.vP'>")
     */
    private ?\DateTime $expiresAt = null;
    private ?float $rate = null;
    private ?float $settleAmount = null;
    private ?string $settleMethod = null;
    private ?string $affiliateId = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function getDepositAmount(): ?float
    {
        return $this->depositAmount;
    }

    public function getDepositMethod(): ?string
    {
        return $this->depositMethod;
    }

    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function getSettleAmount(): ?float
    {
        return $this->settleAmount;
    }

    public function getSettleMethod(): ?string
    {
        return $this->settleMethod;
    }

    public function getAffiliateId(): ?string
    {
        return $this->affiliateId;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
