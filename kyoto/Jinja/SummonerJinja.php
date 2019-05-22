<?php


namespace SummonersKyoto\Jinja;


use SummonersKyoto\Kami\SummonerName;


interface SummonerJinja
{
    public function welcomeSummoner(SummonerName $summonerName): Summoner;
}
