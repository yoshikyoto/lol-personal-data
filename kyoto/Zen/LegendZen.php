<?php

namespace SummonersKyoto\Zen;

use SummonersKyoto\Kami\ChampionKey;
use SummonersKyoto\Kami\ChampionMastery;
use Yoshikyoto\Riotgames\Model\ChampionMastery as ZenChampionMastery;
use Yoshikyoto\Riotgames\Api\Client;
use Yoshikyoto\Riotgames\Api\Enum\Language;
use Composer\Semver\Semver;
use SummonersKyoto\Kami\Version;
use SummonersKyoto\Kami\SummonerId;
use SummonersKyoto\Kami\SummonerName;
use SummonersKyoto\Kami\Summoner;

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

    public function welcomeChampions(Version $version): array
    {
        return $this->client->getChampions(
            $version->__toString(),
            Language::JA_JP
        );
    }

    public function welcomeCurrentVersion(): Version
    {
        $versions = array_filter($this->client->getVersions(), function($version) {
            return $this->isValidVersion($version);
        });
        $this->semver->rsort($versions);
        return new Version($versions[0]);
    }

    public function isValidVersion(string $version): bool
    {
        return preg_match('/^[0-9]+\.[0-9]+\.[0-9]+$/u', $version) === 1;
    }

    public function welcomeSummoner(SummonerName $summonerName): Summoner
    {
        $summoner = $this->client->getSummoner($summonerName->__toString());
        return new Summoner(
            new SummonerName($summoner->getName()),
            new SummonerId($summoner->getId())
        );
    }

    public function welcomeChampionMasteries(SummonerId $summonerId)
    {
        $masteries = $this->client->getChampionMastery($summonerId->__toString());
        return array_map(function($mastery) {
            return $this->welcomeChampionMastery($mastery);
        }, $masteries);
    }

    private function welcomeChampionMastery(ZenChampionMastery $mastery)
    {
        return new ChampionMastery(
            $mastery->getChestGranted(),
            new ChampionKey($mastery->getChampionId()),
            $mastery->getChampionLevel(),
            $mastery->getTokensEarned()
        );
    }
}
