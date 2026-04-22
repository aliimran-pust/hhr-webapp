<?php

namespace AI\Auth\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->get();

        return view('ai-auth::role.index', ['roles' =>  $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ai-auth::role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'unique:roles,name', 'string', 'max:255'],
            'label' => ['required', 'string', 'max:255']
        ]);

        $data['slug'] = Str::slug($data['name']);
        Role::create($data);

        $this->messageSession($request, 'Role has been created.');
        return redirect()->route('auth.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('ai-auth::role.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('ai-auth::role.edit', [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $data = $request->validate([
                'name' => ['required', 'unique:roles,name,'.$id, 'string', 'max:255'],
                'label' => ['required', 'string', 'max:255']
            ]);

            $data['slug'] = Str::slug($data['name']);

            $role = Role::findOrfail($id);

            if(! $role)
            {
                $this->messageSession($request, 'Role not found.');
                return back()->withInput();
            }

            $role->update($data);

            $this->messageSession($request, 'Role has been updated.');
            return redirect()->route('auth.roles.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
