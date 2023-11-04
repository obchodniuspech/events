<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * get all users
     *
     * @return \App\Http\Controllers\Illuminate\Http\JsonResponse
     * @return \App\Http\Controllers\Illuminate\Http\RedirectResponse
     */
    public function readAll(): View|JsonResponse
    {
        $roles = Role::orderBy('name', 'asc')->paginate(200);
        /* $owner = User::find(1);
        $owner->assignRole('Super Admin'); */
        /* $role = Role::create(['name' => 'Super Admin']);

        $role = Role::create(['name' => 'Zaměstnanec']);
        $permission = Permission::create(['name' => 'Výdajové (přijaté) faktury čtení']);
        $role->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Výdajové (přijaté) faktury editace']);
        $role->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Příjmové (vydané) editace']);
        $role->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Příjmové (vydané) čtení']);
        $role->givePermissionTo($permission); */

        return view('roles.readAll', ['roles' => $roles]);
    }

    /**
     * edit or create new user
     *
     * @return \App\Http\Controllers\Illuminate\Http\JsonResponse
     * @return \App\Http\Controllers\Illuminate\Http\RedirectResponse
     */
    public function edit(int $id = null): View
    {

        $permissionsAll = Permission::orderBy('name', 'asc')->get();

        if (isset($id)) {
            $role = Role::find($id);
            $permissionsRole = $role->permissions->pluck('name')->toArray();
        }

        return view('roles.edit', [
            'role' => $role ?? null,
            'permissionsAll' => $permissionsAll ?? null,
            'permissionsRole' => $permissionsRole ?? [],
        ]);
    }

    /**
     * save user
     *
     * @return \App\Http\Controllers\Illuminate\Http\RedirectResponse
     */
    public function store(Request $req): RedirectResponse
    {

        $req['status'] = $req['status'] === 'on';

        $data = [[
            'name' => $req->name,
            'guard_name' => 'web',
        ]];

        if (isset($req->id)) {
            $role = Role::find($req->id);
            $role->syncPermissions($req->permissions);
        }

        $roleIdDb = Role::upsert($data, ['id']);
        $roleId = $req->id ?? $roleIdDb;

        // All current permissions will be removed from the role and replaced by the array given
        $role = Role::find($roleId);
        $role->syncPermissions($req->permissions);

        return redirect(route('roles'));
    }
}
