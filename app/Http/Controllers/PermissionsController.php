<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view_permissions');
        $this->middleware('permission:add_permissions');
        $this->middleware('permission:edit_permissions');
        $this->middleware('permission:delete_permissions');
    }

    public function index()
    {
        $permissions = Permission::orderBy('id', 'desc')->paginate(10);
        return view('admin/permissions')->with([
            'permissions' => $permissions,
        ]);
    }

    //add permission
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        $permission = Permission::create(['name' => $request->input('name')]);

        return response()->json($permission);
    }

    //edit permission

    public function edit($id)
    {
        $permission = Permission::find($id);
        return response()->json($permission);
    }


    //update permission

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name,' . $id,
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();

        return response()->json($permission);
    }


    //delete permission

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        return response()->json($permission);
    }
}
