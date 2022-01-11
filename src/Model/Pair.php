<?php

namespace SonOfLiberty\SideShift\Model;

class Pair
{
    private float $min;
    private float $max;
    private float $rate;
    private float $estimatedNetworkFeesUsd;
    
    public function getMin(): float
    {
        return $this->min;
    }

    public function getMax(): float
    {
        return $this->max;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function getEstimatedNetworkFeesUsd(): float
    {
        return $this->estimatedNetworkFeesUsd;
    }
}
