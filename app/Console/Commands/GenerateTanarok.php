<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateTanarok extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate users';

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
     * @return void
     */
    public function handle()
    {
        ini_set('memory_limit', '2048M');

        dd(\App\Models\User::factory(10)->create());
    }
}
