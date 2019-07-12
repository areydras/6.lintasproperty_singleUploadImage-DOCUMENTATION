<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function showLogin()
    {
        return view('auth.sign');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3',
            'password' => 'required|min:6'
        ]);

        $field = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username'; //jika $request->username sama dengan data yg ada di column email atau username

        if (Auth::attempt([$field => $request->username, 'password' => $request->password])) { //jika username/email dan password yg dimasukan sesuai dengan yg ada didatabase (bisa liat di laravel.com bagian attempt)
            if(Auth::user()->level == 'developer'){
                return redirect('/admin/developer');
            }else{
                return redirect('/admin/dashboard');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
