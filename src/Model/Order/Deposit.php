<?php

namespace SonOfLiberty\SideShift\Model\Order;

use JMS\Serializer\Annotation as Serializer;
use SonOfLiberty\SideShift\Model\Order\Deposit\DepositTx;
use SonOfLiberty\SideShift\Model\Order\Deposit\SettleTx;

class Deposit
{
    private string $depositId;
    private string $status;
    private float $depositAmount;
    private ?DepositTx $depositTx;
    private float $settleRate;
    private float $settleAmount;
    private ?float $networkFeeAmount = null;
    /**
     * @Serializer\SerializedName("createdAtISO")
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.vP'>")
     */
    private ?\DateTime $createdAt = null;
    private ?SettleTx $settleTx = null;
    private ?string $refundAddress = null;
    private ?string $refundTx = null;
    private ?string $reason = null;

    public function getDepositId(): string
    {
        return $this->depositId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDepositAmount(): float
    {
        return $this->depositAmount;
    }

    public function getDepositTx(): ?DepositTx
    {
        return $this->depositTx;
    }

    public function getSettleRate(): float
    {
        return $this->settleRate;
    }

    public function getSettleAmount(): float
    {
        return $this->settleAmount;
    }

    public function getNetworkFeeAmount(): ?float
    {
        return $this->networkFeeAmount;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function getSettleTx(): ?SettleTx
    {
        return $this->settleTx;
    }

    public function getRefundAddress(): ?string
    {
        return $this->refundAddress;
    }

    public function getRefundTx(): ?string
    {
        return $this->refundTx;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }
}
