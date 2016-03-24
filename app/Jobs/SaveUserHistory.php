<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\History;

class SaveUserHistory extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;
    protected $description;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $description = '')
    {
        $this->user = $user;
        $this->description = $description;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        History::create([
            'user_id' => $this->user->id,
            'description' => $this->description
        ]);
    }
}
