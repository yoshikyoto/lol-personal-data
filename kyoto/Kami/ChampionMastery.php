<?php


namespace SummonersKyoto\Kami;

/**
 * チャンピオンマスタリーの情報
 */
class ChampionMastery implements Hengakable
{
    /**
     * @var bool チェストを獲得しているかどうか
     */
    private $isChestGranted;

    /**
     * @var ChampionKey
     */
    private $championKey;

    /**
     * @var int
     */
    private $championLevel;

    /**
     * @var int マスタリートークンの数
     */
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

    public function hengaku(): array
    {
        return [
            'isChestGranted' => $this->isChestGranted,
        ];
    }
}
