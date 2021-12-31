<?php

namespace SonOfLiberty\SideShift\Model\Order\Deposit;

class SettleTx
{
    private string $type;
    private ?string $txHash = null;

    public function getType(): string
    {
        return $this->type;
    }

    public function getTxHash(): ?string
    {
        return $this->txHash;
    }
}
