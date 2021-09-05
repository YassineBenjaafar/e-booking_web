<?php

namespace App\Http\Controllers\Espace_client\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:client')->except('logout');
    }
    public function showLoginForm()
    {
        return view('espace_client.auth.login');
    }

    public function Login(Request $request)
    {
       // dd("in client");
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/')->with('status','you are logged in!');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard('client')->logout();
        return redirect()->intended('/')->with('statusOut','you are logged out!');;
          
    }
}
