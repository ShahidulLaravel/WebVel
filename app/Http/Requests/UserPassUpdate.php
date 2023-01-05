<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserPassUpdate extends FormRequest
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
     * @return array<string, mixed>
     */

   
    // for validation rules 
    public function rules()
    {
        return [
            'old_password' => ['required'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->symbols()
                    ->numbers()
            ],
            'password_confirmation' => ['required'],
        ];
    }

    // for validation meeages
    public function messages()
    {
        return [
            'old_password.required' => "Please Enter your Old Password First",
            'password.required' => "Enter a New Password",
            'password_confirmation.required' => "Re-enter Your New Password"
        ];
    }



}
