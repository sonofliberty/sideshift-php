<?php

namespace SonOfLiberty\SideShift\Model;

use JMS\Serializer\Annotation as Serializer;
use SonOfLiberty\SideShift\Model\Facts\Asset;
use SonOfLiberty\SideShift\Model\Facts\DepositMethod;
use SonOfLiberty\SideShift\Model\Facts\SettleMethod;

class Facts
{
    /**
     * @var Asset[]
     *
     * @Serializer\Type("array<SonOfLiberty\SideShift\Model\Facts\Asset>")
     */
    private array $assets = [];

    /**
     * @var DepositMethod[]
     *
     * @Serializer\Type("array<SonOfLiberty\SideShift\Model\Facts\DepositMethod>")
     */
    private array $depositMethods = [];

    /**
     * @var SettleMethod[]
     *
     * @Serializer\Type("array<SonOfLiberty\SideShift\Model\Facts\SettleMethod>")
     */
    private array $settleMethods = [];

    /**
     * @return Asset[]
     */
    public function getAssets(): array
    {
        return $this->assets;
    }

    /**
     * @return DepositMethod[]
     */
    public function getDepositMethods(): array
    {
        return $this->depositMethods;
    }

    /**
     * @return SettleMethod[]
     */
    public function getSettleMethods(): array
    {
        return $this->settleMethods;
    }
}
