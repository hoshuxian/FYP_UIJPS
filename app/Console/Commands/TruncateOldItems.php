<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Event;

class TruncateOldItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Outdated Event deleted';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        event::select('*')->where('event_date', '<', Carbon::now())->delete();
    }
}
