<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRegisterValidation extends FormRequest
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
            'owner_first_name'=>'required|min:2|max:50|alpha',
            'owner_last_name'=>'required|min:2|max:50|alpha',
            'price'=>'required',
            'no_of_rooms'=>'required',
            'location'=>'required',
            'water_facility'=>'required',
            'parking'=>'required',
            'image'=>'required|image',
            'email'=>'required|email',
            'phone'=>'required|numeric|max:9999999999',
        ];
    }
    public function messages(){

        return [
            'owner_first_name.required'=>'Please enter your first name',
            'owner_first_name.min'=>'First name must be at least 2 characters',
            'owner_first_name.max'=>'First name must be less than 50 characters',
            'owner_first_name.alpha'=>'First name must contain only aplhabets with no spaces',
            'owner_last_name.required'=>'Please enter your last name',
            'owner_last_name.min'=>'Last name must be at least 2 characters',
            'owner_last_name.max'=>'Last name must be less than 50 characters',
            'owner_last_name.alpha'=>'Last name must contain only aplhabets with no spaces',
            'image.image'=>'Please choose file with extension .jpg,.jpeg,.png',
            'email.required'=>'Please enter your e-mail',
            'phone.required'=>'Please enter your phone number',
            'phone.max'=>'Phone number must be at most 10 digits only',
            'image.required'=>'Please choose an image',
            'price.required'=>'Please choose price category',
            'location.required'=>'Please specify location',
            'no_of_rooms.required'=>'Please choose number of rooms',
            'water_facility.required'=>'Please choose water facility category',
            'parking.required'=>'Please choose parking category',
        ];
    }
}
