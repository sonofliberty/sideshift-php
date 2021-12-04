<?php

namespace SonOfLiberty\SideShift\Model\Facts;

class DepositMethod
{
    private ?string $asset = null;
    private ?string $displayName = null;
    private bool $enabled = false;
    private bool $invoice = false;
    private bool $invoiceRequiresAmount = false;

    public function getAsset(): ?string
    {
        return $this->asset;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function isInvoice(): bool
    {
        return $this->invoice;
    }

    public function isInvoiceRequiresAmount(): bool
    {
        return $this->invoiceRequiresAmount;
    }
}