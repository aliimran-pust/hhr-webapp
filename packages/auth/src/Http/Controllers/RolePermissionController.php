<?php

namespace AI\Auth\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RolePermissionController extends BaseController
{
    public function index()
    {
        // abort_if(Gate::denies('role-permission-access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all();
        return view('ai-auth::role_permission.index', compact('roles'));
    }

    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all()->pluck('name', 'id');

        return view('ai-auth::role_permission.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {

    }

    public function edit($role_id)
    {
        $role = Role::findOrfail($role_id);
        $permissions = Permission::all()->pluck('name', 'id');

        return view('ai-auth::role_permission.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role_id)
    {
        $data = $request->validate([
            'role_id' => ['required', 'numeric'],
            'permissions.*' => ['required'],
            'permissions' => ['required', 'array'],
        ]);

        $role = Role::findOrfail($data['role_id']);

        $role->permissions()->sync($data['permissions']);

        $this->messageSession($request, 'Role-Permissions has been updated.');

        $roles = Role::all();
        return view('ai-auth::role_permission.index', compact('roles'));
    }
}
