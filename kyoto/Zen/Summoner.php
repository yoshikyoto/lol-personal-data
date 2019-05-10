<?php


namespace SummonersKyoto\Zen;


class Summoner
{
    private $name;

    private $id;

    public function __construct(SummonerName $name, SummonerId $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function getName(): SummonerName
    {
        return $this->name;
    }

    public function getId(): SummonerId
    {
        return $this->id;
    }


}
