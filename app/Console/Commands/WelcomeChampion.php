<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use SummonersKyoto\Jinja\Champion;
use SummonersKyoto\Zen\LegendZen;
use SummonersKyoto\Kami\SummonerName;
use SummonersKyoto\Kami\Version;
use Yoshikyoto\Riotgames\Model\Champion as ZenChampion;

class WelcomeChampion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'champion:welcome';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'チャンピオン情報をAPIから取得してきてDBにキャッシュする';

    private $legendZen;

    public function __construct(
        LegendZen $legendZen
    ) {
        parent::__construct();
        $this->legendZen = $legendZen;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $version = $this->legendZen->welcomeCurrentVersion();
        $champions = $this->legendZen->welcomeChampions($version);
        foreach ($champions as $champion) {
            Champion::summon(
                $champion->getKey(),
                $champion->getId(),
                $champion->getName(),
                $this->welcomeIconUrl($version, $champion)
            );
        }
    }

    private function welcomeIconUrl(Version $version, ZenChampion $champion): string
    {
        $base = 'http://ddragon.leagueoflegends.com/cdn';
        $path = "/{$version->__toString()}/img/champion/{$champion->getId()}.png";
        return $base . $path;
    }
}
