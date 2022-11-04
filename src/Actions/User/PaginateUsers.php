<?php

namespace IdealTrends\dashboardIdeal\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class PaginateUsers
{
    use AsAction;

    public function handle()
    {
        return User::paginate();
    }
}
