<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRoomAcceptRequestValidation extends FormRequest
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
            'dob'=>'required|date',
            'marital_status'=>'required',
            'occupation'=>'required',
            //'image'=>'required|image',
            'email'=>'required|email',
            'phone'=>'required|numeric|max:9999999999',
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
            'phone.required'=>'Please enter your phone number',
            'phone.max'=>'Phone number must be at most 10 digits only',
            'image.required'=>'Please choose an image',
            'dob.required'=>'Please enter date of birth',
            'dob.date'=>'Please enter valid date',
            'occupation.required'=>'Please enter occupation',
            'occupation.max'=>'Please enter characters between 1 and 50',
        ];
    }
}
