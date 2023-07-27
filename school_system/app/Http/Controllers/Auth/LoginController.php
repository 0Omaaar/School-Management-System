<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;


    public function loginForm($type)
    {
        return view('auth.login', compact('type'));
    }

    public function login(Request $request)
    {

        // if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return $this->redirect($request);
        // } else {
        //     return redirect()->back()->with('message', 'There is an Error, Please Repeat !');
        // }

    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}