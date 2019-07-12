<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegister()
    {
        // return abort(404);
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        // return abort(404);
        $this->validate($request, [
            'name' => 'required|min:3',
            'username' => 'required|min:3|unique:users',
            'email' => 'required|min:3|email|unique:users',
            'phone' => 'required|numeric',
            'password' => 'required|min:6|confirmed'
        ]);

        $request->merge([
            'password' => Hash::make($request->password)
        ]);
        User::create($request->all());
        return redirect()->route('login');
    }


}
