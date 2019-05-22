<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SummonersKyoto\Jinja\ChampionMasteryJinja;
use SummonersKyoto\Jinja\SummonerJinja;
use SummonersKyoto\Zen\LegendZen;
use Yoshikyoto\Riotgames\Api\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function ($app) {
            return new Client(env('RIOTGAMES_API_KEY'));
        });

        $this->app->singleton(SummonerJinja::class, function($app) {
            return $app->make(LegendZen::class);
        });
        $this->app->singleton(ChampionMasteryJinja::class, function($app) {
            return $app->make(LegendZen::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
