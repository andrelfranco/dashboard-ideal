<?php

namespace IdealTrends\dashboardIdeal\Actions\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class DestroyUser
{
    use AsAction;

    public function handle(User|int $user)
    {
        DB::beginTransaction();

        try {
            if (is_int($user)) {
                /** @var User */
                $user = FindUser::run($user);
            }

            $user->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
