<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   public function rules()
    {
        return [
            'first_name'=>'required|min:2|max:50|alpha',
            'last_name'=>'required|min:2|max:50|alpha',
            'gender'=>'required',
            'email'=>'required|email|unique:users|unique:admins|unique:owners',
            'phone'=>'required|numeric|max:9999999999|unique:users|unique:admins|unique:owners',
            //'image'=>'required|image',
            'user_name'=>'required|string|unique:users|unique:admins|unique:owners',
            'password'=>'required|string|min:6|confirmed',
           
        ];
    }


    public function messages(){

        return [
            'first_name.required'=>'Please enter your first name',
            'first_name.min'=>'First name must be at least 2 characters',
            'first_name.max'=>'First name must be less than 50 characters',
            'first_name.alpha'=>'First name must contain only aplhabets with no spaces',
            'last_name.required'=>'Please enter your last name',
            'last_name.min'=>'Last name must be at least 2 characters',
            'last_name.max'=>'Last name must be less than 50 characters',
            'last_name.alpha'=>'Last name must contain only aplhabets with no spaces',
            'image.image'=>'Please choose file with extension .jpg,.jpeg,.png',
            'email.required'=>'Please enter your e-mail',
            'email.unique'=>'This email is already taken.Please enter another e-mail',
            'phone.required'=>'Please enter your phone number',
            'phone.unique'=>'This phone number is already taken. Please enter another phone number',
            'image.required'=>'Please choose an image',
            'user_name.required'=>'Please enter user name',
            'user_name.unique'=>'This user name is already taken. Please enter another user name',
            'password.required'=>'Please enter password',


        ];
    }
}
