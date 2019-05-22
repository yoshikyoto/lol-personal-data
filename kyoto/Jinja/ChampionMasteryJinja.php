<?php


namespace SummonersKyoto\Jinja;

use SummonersKyoto\Kami\ChampionMastery;
use SummonersKyoto\Kami\SummonerId;

interface ChampionMasteryJinja
{

    /**
     * $summonerIdに対応するChampionMasteryを全て取得して返す
     * @return ChampionMastery[]
     * @param SummonerId $summonerId
     * @return array
     */
    public function welcomeChampionMasteries(SummonerId $summonerId): array;
}
