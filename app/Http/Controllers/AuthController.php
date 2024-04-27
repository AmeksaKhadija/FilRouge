<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function register(){
        return view('Auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user=new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->id_role = 2;
        $user->save();
        return redirect('/login');
    }


    public function login()
    {
        return view('Auth.login');
    }

    public function loginpost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $userId = Auth::user()->id;
            $role = Auth::user()->id_role;
            session(['user_id' => $userId]);
            session(['user_role' => $role]);

            if ($role == 1) {
                return redirect()->intended('/products');
            } else {
                return redirect()->intended('/allproducts');
            }
        }

        return back()->with('error', 'Invalid email or password');
    }

    public function logout(){
        Auth::logout();
        return redirect('/allproducts');
    }
}
