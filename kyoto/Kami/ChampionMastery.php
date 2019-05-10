<?php


namespace SummonersKyoto\Kami;


class ChampionMastery
{
    private $isChestGranted;

    private $championKey;

    private $championLevel;

    private $tokensEarned;

    public function __construct(
        bool $isChestGranted,
        ChampionKey $championKey,
        int $championLevel,
        int $tokensEarned
    ) {
        $this->isChestGranted = $isChestGranted;
        $this->championKey = $championKey;
        $this->championLevel = $championLevel;
        $this->tokensEarned = $tokensEarned;
    }

    public function isChestGranted(): bool
    {
        return $this->isChestGranted;
    }

    public function getChampionKey(): ChampionKey
    {
        return $this->championKey;
    }

    public function getChampionLevel(): int
    {
        return $this->championLevel;
    }

    public function getTokensEarned(): int
    {
        return $this->tokensEarned;
    }


}
