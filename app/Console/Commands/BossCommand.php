<?php

namespace App\Console\Commands;

use App\Services\Boss\BossTimer;
use Illuminate\Console\Command;

class BossCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boss {--f|frontend} {--w|w-db}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Like a boss. add --frontend for building frontend';

    protected $timer;

    /**
     * BossCommand constructor.
     * @param BossTimer $timer
     */
    public function __construct(BossTimer $timer)
    {
        $this->timer = $timer;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->timer->take();
        $this->alert('Like a boss');

        if (!$this->option('w-db')) {

            $this->info('call migrate:fresh');
            $this->call('migrate:fresh');


            $this->info('call migrate');
            $this->call('migrate');

            $this->info('call db:seed');
            $this->call('db:seed');
        }

        if ($this->option('frontend')) {
            $this->info('run building frontend...');
            $this->info(shell_exec('npm install'));
            $this->info(shell_exec('npm run dev'));
        }

        $this->alert('Boss command complete, it took: ' . $this->timer->difference());
    }
}
