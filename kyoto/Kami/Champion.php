<?php


namespace SummonersKyoto\Kami;


class Champion
{
    /**
     * @var ChampionKey
     */
    private $key;

    /**
     * @var ChampionName
     */
    private $name;

    /**
     * @var ChampionIconUrl
     */
    private $iconUrl;

    /**
     * Champion constructor.
     * @param $key
     * @param $name
     * @param $iconUrl
     */
    public function __construct(
        ChampionKey $key,
        ChampionName $name,
        ChampionIconUrl $iconUrl
    ) {
        $this->key = $key;
        $this->name = $name;
        $this->iconUrl = $iconUrl;
    }

    /**
     * @return ChampionKey
     */
    public function getKey(): ChampionKey
    {
        return $this->key;
    }

    /**
     * @return ChampionName
     */
    public function getName(): ChampionName
    {
        return $this->name;
    }

    /**
     * @return ChampionIconUrl
     */
    public function getIconUrl(): ChampionIconUrl
    {
        return $this->iconUrl;
    }
}
