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

    public function __construct(
        SummonerJinja $summonerJinja
    ) {
        $this->summonerJinja = $summonerJinja;
    }

    /**
     * チャンピオンマスタリーとチャンピオンの情報をとってarrayにして返す
     */
    public function welcome(string $summonerNameString): array
    {
        $summonerName = new SummonerName($summonerNameString);
        $championMasteries = $this->summonerJinja->welcomeSummoner($summonerName);
        $hengaku = $this->hengakuMulti($championMasteries);
        return $hengaku;
    }
}
