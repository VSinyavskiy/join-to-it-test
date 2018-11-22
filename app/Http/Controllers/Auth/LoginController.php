<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->only(['login', 'loginPost']);
        $this->middleware('auth')->only(['logout']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->is_remember)) {
            return redirect()->intended(route('admin.dashboard'));
        } 

        return redirect()->back()->withInput($request->only('email', 'is_remember'))->withErrors([
            'password' => __('admin_layout.login.error'),
        ]);
    }

    public function logout()
    {
        auth()->guard()->logout();

        return redirect()->route('login');
    }
}
