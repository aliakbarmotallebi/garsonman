<?php

namespace App\Http\Controllers\Dashboard;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('dashboard.auth.login');
    }  
      
    public function postLogin(Request $request)
    {
      
        $request->validate([
            'phone_number' => 'required',
            'password'     => 'required',
        ]);

        $credentials = $request->only('phone_number', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard.index'))
                        ->withSuccess('successfully');
        }
  
        return redirect(route('login'))->withErrors('Oppes!');
    }
      
    public function logout(Request $request) {
        Auth::logout();
        return redirect(RouteServiceProvider::HOME);
    }

    public function username()
    {
        return 'phone_number';
    }
}
