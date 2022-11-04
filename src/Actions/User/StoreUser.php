<?php

namespace IdealTrends\dashboardIdeal\Actions\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreUser
{
    use AsAction;

    public function handle(Collection $data)
    {
        DB::beginTransaction();

        try {
            $userData = array_merge($data->toArray(), [
                'password' => $data->has('password') ? $data->password : bcrypt('123456')
            ]);

            $user = User::create($userData);

            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
