<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Models\User;
use App\Scopes\RoleScope;
use Illuminate\Console\Command;

class UserDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete {email} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete user given email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $user = User::withTrashed()->where('email', $this->argument('email'))->first();

        if (! $user) {
            $this->error('Error: User not found');
            return 0;
        }

        if ($this->hasOption('force') && $this->option('force')) {
            if ($projectCount = Project::withoutGlobalScope(new RoleScope)->where('creator_id', $user->id)->count()) {
                $this->warn("Deleting this user will delete {$projectCount} projects associated with them. Please transfer ownership first.");

                return 1;
            }
            $user->forceDelete();

            $this->info('Success! User successfully deleted permanently');
        } else {
            $user->delete();

            $this->info('Success! User successfully deleted');
        }

        return 1;
    }
}
