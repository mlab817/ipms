<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DbLoadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load database from mysql file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $files = \File::allFiles(database_path('backups'));

        $files = collect($files)->sortBy(function ($file) {
            return $file->getCTime();
        });

        $latestSql = $files[count($files) - 1];

        if (DB::unprepared(file_get_contents($latestSql))) {
            $this->info('Successfully loaded database');
        }

        return 1;
    }
}
