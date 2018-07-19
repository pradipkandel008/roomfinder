<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class OwnerLoginController extends Controller
{
    use AuthenticatesUsers;
    
      public function __construct()
    {
        $this->middleware('guest:owner',['except'=>['logout' ] ]);
    }

    public function showLoginForm(){
    	return view('auth.owner-login');
    }

    public function login(Request $request){
    	
    	$this->validate($request,[
    		'email'=>'required|email',
    		'password'=>'required'
    	]);

    	if(Auth::guard('owner')->attempt(['email'=>$request->email, 'password'=>$request->password],$request->remember)){
           /* dd(Auth::check());*/
    		return redirect()->intended(route('homepageowner'));
    	}
      return redirect()->route('owner.login')->with('error','Invalid Username or Password');
    	
    }

     public function logout()
    {
        Auth::guard('owner')->logout();

        return redirect(route('owner.login'));
    }
}
