<?php


namespace SummonersKyoto\Jinja;


use SummonersKyoto\Kami\SummonerName;
use SummonersKyoto\Kami\Summoner;


interface SummonerJinja
{
    public function welcomeSummoner(SummonerName $summonerName): Summoner;
}
