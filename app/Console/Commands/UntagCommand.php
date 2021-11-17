<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\ProgressBar;

class UntagCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'untag';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes PIP and TRIP tagging in dropped PAPs';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $projects = Project::dropped()->get();

        if (! count($projects)) {
            $this->info('No PAPs to untag');
            return 1;
        }

        $bar = $this->output->createProgressBar(count($projects));

        $bar->start();

        foreach ($projects as $project) {
            $project->pip = false;
            $project->ref_pip_typology_id = null;
            $project->trip = false;
            $project->saveQuietly();

            $bar->advance();
        }

        $bar->finish();

        $this->info('Successfully untagged dropped PAPs');

        return 1;
    }
}
