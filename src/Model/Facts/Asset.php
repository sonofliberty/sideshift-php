<?php

namespace SonOfLiberty\SideShift\Model\Facts;

class Asset
{
    private ?string $id = null;
    private ?string $name = null;

    function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): Asset
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Asset
    {
        $this->name = $name;
        return $this;
    }
}