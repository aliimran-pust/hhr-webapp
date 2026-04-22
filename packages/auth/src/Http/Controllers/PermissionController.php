<?php

namespace AI\Auth\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('ai-auth::permission.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ai-auth::permission.create');
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
            'name' => ['required', 'unique:permissions,name', 'string', 'max:255'],
            'label' => ['required', 'string', 'max:255']
        ]);

        $data['slug'] = Str::slug($data['name']);
        Permission::create($data);

        $this->messageSession($request, 'Permission has been created.');
        return redirect()->route('auth.permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('ai-auth::permission.show', ['permission' => $permission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('ai-auth::permission.edit', ['permission' => $permission]);
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
                'name' => ['required', 'unique:permissions,name,'.$id, 'string', 'max:255'],
                'label' => ['required', 'string', 'max:255']
            ]);

            $data['slug'] = Str::slug($data['name']);

            $permission = Permission::findOrfail($id);

            if(! $permission)
            {
                $this->messageSession($request, 'Permission not found.');
                return back()->withInput();
            }

            $permission->update($data);

            $this->messageSession($request, 'Permission has been updated.');
            return redirect()->route('auth.permissions.show', $id);
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
