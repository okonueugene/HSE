<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginUser(Request $request)
    {
        $rules=array(
            'email' => 'required',
            'password' => 'required'
        );
        $validator=Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 403);
        }

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user, $request->has('remember-me'));
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp(),
        ]);

            return redirect()->route('dashboard');
        }
        else{
            //
            return redirect()->route('login')->with('error', 'Invalid login details');
        }
    }

    public function registerUser(Request $request)
    {
        $rules=array(
            'name' => 'required',
            'email' => "required|email|unique:users,email,",
            'password' => 'required|min:8',
            'password_confirmed' => 'required|min:8|same:password'
        );
        $validator=Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 403);
        } 
   
        // if user already exists return error
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return redirect()->route('register')->with('error', 'User already exists');
        }
        // create new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        // hash password
        $user->password = Hash::make($request->password);

        // save user
        $user->save();


    return redirect()->route('login');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function resetPassword()
    {
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);
        return redirect()->route('dashboard');
    }

    
}
