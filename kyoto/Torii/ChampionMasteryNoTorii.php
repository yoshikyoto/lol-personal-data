<?php


namespace SummonersKyoto\Torii;

use SummonersKyoto\Jinja\ChampionMasteryJinja;
use SummonersKyoto\Jinja\SummonerJinja;
use SummonersKyoto\Kami\HengakuSyokunin;
use SummonersKyoto\Kami\SummonerName;

class ChampionMasteryNoTorii
{
    use HengakuSyokunin;

    private $summonerJinja;

    private $championMasteryJinja;

    public function __construct(
        SummonerJinja $summonerJinja,
        ChampionMasteryJinja $championMasteryJinja
    ) {
        $this->summonerJinja = $summonerJinja;
        $this->championMasteryJinja = $championMasteryJinja;
    }

    /**
     * チャンピオンマスタリーとチャンピオンの情報をとってarrayにして返す
     */
    public function welcome(string $summonerNameString): array
    {
        $summonerName = new SummonerName($summonerNameString);
        $summoner = $this->summonerJinja->welcomeSummoner($summonerName);
        $championMasteries = $this->championMasteryJinja->welcomeChampionMasteries($summoner->getId());
        $hengaku = $this->hengakuMulti($championMasteries);
        return $hengaku;
    }
}
