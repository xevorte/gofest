<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'job' => 'required|string|max:255',
            'image' => 'image',
            'email_verified_at' => 'nullable|date',
            'password' => 'required|string|min:8',
            'remember_token' => 'nullable',
            'role' => 'required|string|max:255'
        ];
    }
}
