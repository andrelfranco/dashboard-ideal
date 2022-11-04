<?php

namespace IdealTrends\dashboardIdeal\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class FakeSeed extends Command
{
    protected $signature = 'dashboard-ideal:fake-seed';

    protected $description = 'Populate the standard tables with false data for testing.';

    public function handle()
    {
        User::factory()->count(300)->create();

        return Command::SUCCESS;
    }
}
