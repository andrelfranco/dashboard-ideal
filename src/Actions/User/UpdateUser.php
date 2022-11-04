<?php

namespace IdealTrends\dashboardIdeal\Actions\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateUser
{
    use AsAction;

    public function handle(User|int $user, Collection $data)
    {
        DB::beginTransaction();

        try {
            if (is_int($user)) {
                /** @var User */
                $user = FindUser::run($user);
            }

            $user->update($data->toArray());

            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
