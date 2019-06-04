<?php


namespace SummonersKyoto\Jinja;


use SummonersKyoto\Kami\Champion;
use SummonersKyoto\Kami\ChampionKey;

interface ChampionJinja
{
    public function welcomeChampion(ChampionKey $key): Champion;
}
