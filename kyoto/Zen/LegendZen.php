<?php

namespace SummonersKyoto\Zen;

use Yoshikyoto\Riotgames\Api\Client;

class LegendZen
{
    private $client;

    public function __construct(
        Client $client
    ) {
    }

    public function welcomeAllVersions(): array
    {
        var_dump("here");
        return [];
    }
}
