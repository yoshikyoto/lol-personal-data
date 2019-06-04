<?php

namespace SummonersKyoto\Zen;

use SummonersKyoto\Jinja\ChampionMasteryJinja;
use SummonersKyoto\Jinja\SummonerJinja;
use SummonersKyoto\Kami\ChampionKey;
use SummonersKyoto\Kami\ChampionMastery;
use Yoshikyoto\Riotgames\Model\Champion;
use Yoshikyoto\Riotgames\Model\ChampionMastery as ZenChampionMastery;
use Yoshikyoto\Riotgames\Api\Client;
use Yoshikyoto\Riotgames\Api\Enum\Language;
use Composer\Semver\Semver;
use SummonersKyoto\Kami\Version;
use SummonersKyoto\Kami\SummonerId;
use SummonersKyoto\Kami\SummonerName;
use SummonersKyoto\Kami\Summoner;


/**
 * Riot Games API client
 */
class LegendZen implements ChampionMasteryJinja, SummonerJinja
{
    private $client;

    /**
     * @var Semver セマンティックバージョニング判定のモジュール
     */
    private $semver;

    public function __construct(
        Client $client,
        Semver $semver
    ) {
        $this->client = $client;
        $this->semver = $semver;
    }

    /**
     * バージョンを渡すとそのバージョンのチャンピオンん一覧を返す
     * 言語は現状日本語固定。言語を指定するとチャンピオンの説明の言語などが変わる。
     * @param Version $version
     * @return Champion[]
     */
    public function welcomeChampions(Version $version): array
    {
        return $this->client->getChampions(
            $version->__toString(),
            Language::JA_JP
        );
    }

    /**
     * 最新バージョンを返す
     * @return Version
     */
    public function welcomeCurrentVersion(): Version
    {
        $versions = array_filter($this->client->getVersions(), function($version) {
            return $this->isValidVersion($version);
        });
        $this->semver->rsort($versions);
        return new Version($versions[0]);
    }

    /**
     * 9.3.0 などの文字列を渡すと、lol-personal-dataシステム城でvalidなバージョンかどうか
     * （＝セマンティックバージョニングの書き方として正しいかどうか）を返す
     * @param string $version
     * @return bool
     */
    public function isValidVersion(string $version): bool
    {
        return preg_match('/^[0-9]+\.[0-9]+\.[0-9]+$/u', $version) === 1;
    }

    /**
     * SummonerNameを渡すとSummoner情報を返す
     * @param SummonerName $summonerName
     * @return Summoner
     */
    public function welcomeSummoner(SummonerName $summonerName): Summoner
    {
        $summoner = $this->client->getSummoner($summonerName->__toString());
        return new Summoner(
            new SummonerName($summoner->getName()),
            new SummonerId($summoner->getId())
        );
    }

    /**
     * $summonerIdに対応するChampionMasteryを全て取得して返す
     * @return ChampionMastery[]
     * @param SummonerId $summonerId
     * @return array
     */
    public function welcomeChampionMasteries(SummonerId $summonerId): array
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
