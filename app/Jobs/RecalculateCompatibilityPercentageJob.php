<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RecalculateCompatibilityPercentageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user_A;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_A)
    {
        // Since the user update the question, this will affect all match percentages for the user
        // both the users he matched to and the users that matched to him, two different scenarios
        // Retrieve all the matches for the current user
        // Foreach match calculate new compatibility percentage

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
