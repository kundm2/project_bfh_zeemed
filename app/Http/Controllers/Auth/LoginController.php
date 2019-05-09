<?php

namespace App\Http\Controllers\Auth;

use \App\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/dashboard';

    /**
     * Login username to be used by the controller.
     *
     * @var string
     */
    public function username() {
        return 'username';
    }

    public function userid()
    {
        dd('asdfasdf');
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

    public function index() {
        return view('/page_login');
    }

    public function showLoginForm() {
        return view('/page_login');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }

}
