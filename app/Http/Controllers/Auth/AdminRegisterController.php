<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adminrequest;

class AdminRegisterController extends Controller
{
      public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showRegisterForm(){
    	return view('auth.admin-register');
    }

    public function store(RegisterValidation $request){

    	$image=null;
    	if($request->hasFile('image')){
    		$file=$request->file('image');
    		$image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName(); 
    		$file->move('image/uploads/admins/',$image);
    	}

    	Adminrequest::create([
    		'first_name'=>$request->get('first_name'),
    		'last_name'=>$request->get('last_name'),
    		'gender'=>$request->get('gender'),
    		'email'=>$request->get('email'),
    		'phone'=>$request->get('phone'),
    		'image'=>$image,
    		'user_name'=>$request->get('user_name'),
    		'password'=>bcrypt($request->get('password')),
    	]);
    	$request->session()->flash('success_message','Admin Request Posted Successfully.Please wait for approval.');
    	return redirect()->route('admin.register');


    }
}
