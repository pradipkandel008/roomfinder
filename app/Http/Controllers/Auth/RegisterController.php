<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

     public function showRegisterForm()
    {
        return view('auth.register');
    }

     public function store(RegisterValidation $request){
        $image=null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999999).'_'.$file->getClientOriginalName(); 
            $file->move('image/uploads/users',$image);
        }
        User::create([
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'gender'=>$request->get('gender'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'image'=>$image,
            'user_name'=>$request->get('user_name'),
            'password'=>bcrypt($request->get('password')),
        ]);
        $request->session()->flash('success_message','User Registered Successfully.');
        return redirect()->route('user.register');
    }

   
}
