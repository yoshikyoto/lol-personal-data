<?php

namespace SummonersKyoto\Zen;

use Yoshikyoto\Riotgames\Api\Client;
use Composer\Semver\Semver;

class LegendZen
{
    private $client;

    private $semver;

    public function __construct(
        Client $client,
        Semver $semver
    ) {
        $this->client = $client;
        $this->semver = $semver;
    }

    public function welcomeNewestVersion()
    {
        $versions = array_filter($this->client->getVersions(), function($version) {
            return $this->isValidVersion($version);
        });
        $this->semver->rsort($versions);
        return new Version($versions[0]);
    }

    public function isValidVersion(string $version)
    {
        return preg_match('/^[0-9]+\.[0-9]+\.[0-9]+$/u', $version) === 1;
    }

}
