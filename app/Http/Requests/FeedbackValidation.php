<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackValidation extends FormRequest
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
            'first_name' => 'required|min:2|max:50|alpha',
            'last_name' => 'required|min:2|max:50|alpha',
            'feedback' => 'required|string|max:255',
        ];
    }

    public function messages()
    {

        return [
            'first_name.required' => 'Please enter your first name',
            'first_name.min' => 'First name must be at least 2 characters',
            'first_name.max' => 'First name must be less than 50 characters',
            'first_name.alpha' => 'First name must contain only aplhabets with no spaces',
            'last_name.required' => 'Please enter your last name',
            'last_name.min' => 'Last name must be at least 2 characters',
            'last_name.max' => 'Last name must be less than 50 characters',
            'last_name.alpha' => 'Last name must contain only aplhabets with no spaces',
            'feedback.required' => 'Please enter your feedback',
            'feedback.size' => 'Please enter less than 255 characters only',
        ];
    }
}
