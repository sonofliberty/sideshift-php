<?php

namespace SonOfLiberty\SideShift\Model\Order\Deposit;

class DepositTx
{
    private string $txid;

    public function getTxid(): string
    {
        return $this->txid;
    }
}
