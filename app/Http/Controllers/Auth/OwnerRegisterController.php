<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Owner;

class OwnerRegisterController extends Controller
{
    
	protected $folder_path;

     public function __construct()
    {
        $this->middleware('guest:owner');
    }

    /*  public function __construct()
    {
    	$this->folder_path=public_path().DIRECTORY_sEPARATOR.'image'.DIRECTORY_sEPARATOR.'uploads'.DIRECTORY_sEPARATOR.'owners';
    }*/

    public function showRegisterForm(){
    	return view('auth.owner-register');
    }

    public function store(RegisterValidation $request){

    	$image=null;
    	if($request->hasFile('image')){
    		$file=$request->file('image');
    		$image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName(); 
    		$file->move('image/uploads/owners',$image);
    	}

    	Owner::create([
    		'first_name'=>$request->get('first_name'),
    		'last_name'=>$request->get('last_name'),
    		'gender'=>$request->get('gender'),
    		'email'=>$request->get('email'),
    		'phone'=>$request->get('phone'),
    		'image'=>$image,
    		'user_name'=>$request->get('user_name'),
    		'password'=>bcrypt($request->get('password')),
    	]);
    	$request->session()->flash('success_message','Owner Registered Successfully.');
    	return redirect()->route('owner.register');

        


    }
}
