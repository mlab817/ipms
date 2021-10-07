<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the log file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        unlink(storage_path('logs/laravel.log'));

        $this->info('Successfully deleted log file');
    }
}
