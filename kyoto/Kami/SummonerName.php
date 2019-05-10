<?php

namespace SummonersKyoto\Ksmi;

class SummonerName
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
