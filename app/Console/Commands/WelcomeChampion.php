<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use SummonersKyoto\Jinja\Champion;
use SummonersKyoto\Zen\LegendZen;

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

    /**
     * Create a new command instance.
     */
    public function __construct(
        LegendZen $legentZen
    ) {
        parent::__construct();
        $this->legendZen = $legentZen;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $champions = $this->legendZen->welcomeCurrentVersionChampions();
        foreach ($champions as $champion) {
            Champion::summon(
                (int) $champion->getKey(),
                $champion->getName(),
                ''
            );
        }
    }
}
