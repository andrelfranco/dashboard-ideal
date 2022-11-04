<?php

namespace IdealTrends\dashboardIdeal\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class FindUser
{
    use AsAction;

    public function handle(int $userId)
    {
        return User::findOrFail($userId);
    }
}
