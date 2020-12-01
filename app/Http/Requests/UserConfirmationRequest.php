<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserConfirmationRequest extends FormRequest
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
            'name' => 'required|unique:users,name',
            'email' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required_with:password|same:password',
            'type' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
        ];
    }
}
