<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        // return "afak";
    }

    public function login(Request $request)
    {

        if ($request->type == 'student') {
            $guardName = 'student';
        } elseif ($request->type == 'parent') {
            $guardName = 'parent';
        } elseif ($request->type == 'teacher') {
            $guardName = 'teacher';
        } else {
            $guardName = 'web';
        }

        if (Auth::guard($guardName)->attempt(['email' => $request->email, 'password' => $request->password])) {
            if ($request->type == 'student') {
                return redirect()->intended(RouteServiceProvider::STUDENT);
            } elseif ($request->type == 'parent') {
                return redirect()->intended(RouteServiceProvider::PARENT);
                // return "aloo";
            } elseif ($request->type == 'teacher') {
                return redirect()->intended(RouteServiceProvider::TEACHER);
            } else {
                // return redirect()->route('dashboard');
                return redirect()->intended(RouteServiceProvider::HOME);

                // return redirect()->action([HomeController::class, 'dashboard']);
                // return "final";
            }
        } else {
            return redirect()->back()->with('message', 'There is an Error, Please Repeat !');
        }

            // return Auth::guard($guardName);
        // return $request;
    }

    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}