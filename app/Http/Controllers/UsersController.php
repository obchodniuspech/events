<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * get all users
     *
     * @return \App\Http\Controllers\Illuminate\Http\JsonResponse
     * @return \App\Http\Controllers\Illuminate\Http\RedirectResponse
     */
    public function readAll(): View|JsonResponse
    {
        $users = Users::where('id', '!=', 1)->orderBy('id', 'desc')->paginate(200);

        $usersWithRole = [];

        foreach ($users as $userKey => $userVal) {
            $usersWithRole[$userKey] = $userVal;
            $userRoles = User::find($userVal->id)->getRoleNames();
            $usersWithRole[$userKey]['role'] = $userRoles[0] ?? 'Žádná';
        }

        return view('users.readAll', ['users' => $users]);
    }

    /**
     * edit or create new user
     *
     * @return \App\Http\Controllers\Illuminate\Http\JsonResponse
     * @return \App\Http\Controllers\Illuminate\Http\RedirectResponse
     */
    public function edit(int $id = null): View
    {
        $allRoles = Role::all();

        if (isset($id)) {
            $user = User::find($id);
            $currentRole = $user->getRoleNames()->first();
        }

        return view('users.edit', ['user' => $user ?? null, 'allRoles' => $allRoles, 'currentRole' => $currentRole ?? null]);
    }

    /**
     * save user
     *
     * @return \App\Http\Controllers\Illuminate\Http\RedirectResponse
     */
    public function store(Request $req): RedirectResponse
    {

        $req->status = ($req->status === 'on') ? 1 : 0;

        $data = [[
            'name' => $req->name,
            'email' => $req->email,
            'status' => $req->status ?? 0,
        ]];

        if (isset($req->password)) {
            $data[0]['password'] = Hash::make($req->password);
        } elseif (isset($req->id)) {
            $data[0]['password'] = Users::find($req->id)->password;
        }

        if (isset($req->id)) {
            $data[0]['id'] = $req->id;
        }

        $userId = Users::upsert($data, ['id']);
        $user = $req->id ?? $userId;

        // All current roles will be removed from the user and replaced by the array given
        if ($user !== 1 && $user !== Auth::user()->id) {
            $account = User::find($user)->syncRoles([$req->roleName]);
        }

        if (!$account->tokens()->where('personal_access_tokens.name', 'calendar')->first()) {
            $account->createToken('calendar');
        }

        return redirect(route('users'));
    }

}
