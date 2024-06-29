<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersListController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view_users')->only(['index']);
        $this->middleware('permission:add_users')->only(['create', 'store']);
        $this->middleware('permission:edit_users')->only(['edit', 'update']);
        $this->middleware('permission:delete_users')->only(['destroy']);
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('admin/users/index')->with([
            'users' => $users,
            'roles' => Role::all(),
        ]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return response()->json($roles);
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => "required|email|unique:users,email,",
            'password' => 'required|min:8',
            'password_confirmed' => 'required|min:8|same:password'
        );

        // create new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //assign role
        $role = Role::find($request->role);

        $user->assignRole($role);

        return redirect()->route('userslist')->with('success', 'User has been created successfully');

    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('admin/users/edit')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('userslist')->with('success', 'User has been deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // Check if a role is provided in the request and update the user's role
        if ($request->has('role')) {
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $role = Role::find($request->input('role'));
            $user->assignRole($role);
        }

        return response()->json($user);
    }

}
