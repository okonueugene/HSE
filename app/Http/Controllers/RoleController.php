<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view_roles');
        $this->middleware('permission:add_roles');
        $this->middleware('permission:edit_roles');
        $this->middleware('permission:delete_roles');


    }

    public function index()
    {

        $roles = Role::orderBy('id', 'desc')->paginate(10);

        $permissions = Permission::all();

        return view('admin/roles')->with([
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
    //retrieve role
    public function show($id)
    {
        $role = Role::find($id);

        //get permissions
        $role->permissions->pluck('name', 'id')->toArray();

        //set the permissions
        $rolePermissions = $role->permissions->pluck('id', 'name')->toArray();

        return response()->json([
            'role' => $role->name,
            'rolePermissions' => $rolePermissions,
        ]);


    }



    //add role
    public function store(Request $request)
    {

        $rules = [
                    'name' => 'required|unique:roles,name',
                    'permissions' => 'required',
                ];

        $messages = [
            'name.required' => 'Role name is required',
            'name.unique' => 'Role name already exists',
            'permissions.required' => 'Permissions is required',
        ];

        $this->validate($request, $rules, $messages);

        // Create the role
        $role = Role::create(['name' => $request->input('name')]);
        dd($request->input('permissions'));

        // sync permissions
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('roles')->with('success', 'Role has been added successfully');
    }



    //update role
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->syncPermissions($request->input('permissions'));
        $role->save();

        return response()->json($role);
    }

    //delete role

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return response()->json($role);
    }

}