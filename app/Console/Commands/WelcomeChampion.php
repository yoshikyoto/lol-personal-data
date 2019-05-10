<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WelcomeChampion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'champions:welcome';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'チャンピオン情報をAPIから取得してきてDBにキャッシュする';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
