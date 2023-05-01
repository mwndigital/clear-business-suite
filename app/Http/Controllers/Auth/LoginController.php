<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo(){
        if($this->guard()->user()->hasRole(['super admin', 'admin'])){
            return route('admin.dashboard');
        }
        elseif($this->guard()->user()->hasRole('staff')){
            return route('staff.dashboard');
        }
        elseif($this->guard()->user()->hasRole('client')){
            return route('client.dashboard');
        }
        elseif($this->guard()->user()->hasRole('lead')){
            return route('lead.dashboard');
        }
        else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
