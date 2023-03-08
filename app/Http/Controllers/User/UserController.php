<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register', [
            'title' => 'Register',
            'active' => 'register',
        ]);
    }

    public function registerStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'phone' => 'required|min:11|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

       User::create($validatedData);

       return redirect('/login')->with('success', 'Registration successfull! Please login');
    }

    public function login()
    {
        return view('user.login', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            if(Auth::user()->roles == 'admin'){
                $request->session()->regenerate();
                return redirect()->intended('/dashboard/admin');
            }else{
                $request->session()->regenerate();
                return redirect()->intended('/book');
            }
        }
        
        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function error()
    {
        return view('public.error',[
            'title' => '404 | Not Found',
        ]);
    }
}
