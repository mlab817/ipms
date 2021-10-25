<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AdminMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {--email=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a user admin using their email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where('email', $this->option('email'))->first();
        $user->is_admin = true;
        $user->save();

        return Command::SUCCESS;
    }
}
