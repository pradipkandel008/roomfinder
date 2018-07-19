<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:admin', ['except'=>['logout']]) ;
    }
    
      public function showLoginForm()
    {
        return view('auth.admin-login');
    }


     public function login(Request $request){
        
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password],$request->remember)){
            /* dd(Auth::check());*/
            return redirect()->intended(route('homepageadmin'));
        }
         return redirect()->route('admin.login')->with('error','Invalid Username or Password');
        
    }

      public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }

}
