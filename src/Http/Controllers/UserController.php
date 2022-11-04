<?php

namespace IdealTrends\dashboardIdeal\Http\Controllers;

use IdealTrends\dashboardIdeal\Actions\User\DestroyUser;
use IdealTrends\dashboardIdeal\Actions\User\FindUser;
use IdealTrends\dashboardIdeal\Actions\User\PaginateUsers;
use IdealTrends\dashboardIdeal\Actions\User\StoreUser;
use IdealTrends\dashboardIdeal\Actions\User\UpdateUser;
use IdealTrends\dashboardIdeal\Http\Requests\User\StoreUserRequest;
use IdealTrends\dashboardIdeal\Http\Requests\User\UpdateUserRequest;
use Exception;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        try {
            return Inertia::render('Users/Index', [
                'users' => PaginateUsers::run()
            ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        try {
            return Inertia::render('Users/Create');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $user = StoreUser::run($request->collect());
            return to_route('admin.users.index');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function edit(int $userId)
    {
        try {
            return Inertia::render('Users/Edit', [
                'user' => FindUser::run($userId)
            ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function update(UpdateUserRequest $request, int $userId)
    {
        try {
            $user = UpdateUser::run($userId, $request->collect());
            return to_route('admin.users.index');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function destroy(int $userId) {
        try {
            DestroyUser::run($userId);
            return to_route('admin.users.index');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
