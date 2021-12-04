<?php

namespace SonOfLiberty\SideShift\Model\Facts;

class SettleMethod
{
    private ?string $asset = null;
    private ?string $displayName = null;
    private bool $enabled = false;

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
}