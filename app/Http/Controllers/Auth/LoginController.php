<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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
   /* protected $redirectTo = '/login';*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web', ['except'=>['logout']]) ;
    }
    
      public function showLoginForm()
    {
        return view('auth.login');
    }


     public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::guard('web')->attempt(['email'=>$request->email, 'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('homepageuser'));
        }
      return redirect()->route('user.login')->with('error','Invalid Username or Password');   
    }

      public function logout()
    {
        Auth::guard('web')->logout();
        return redirect(route('user.login'));
    }
     
}

 