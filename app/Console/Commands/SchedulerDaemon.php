<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SchedulerDaemon extends Command
{
    protected $signature = 'schedule:daemon {--sleep=3600}';

    protected $description = 'Triggers scheduler every minute or --sleep seconds interval';

    public function handle()
    {
        while (true) {
            $this->info('Calling scheduler');
            $this->call('schedule:run');
            sleep($this->option('sleep'));
        }
    }
}
