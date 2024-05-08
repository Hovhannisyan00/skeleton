<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        $passwordRule = $this->user ? 'nullable' : 'required';

        return [
            'first_name' => 'required|string_with_max',
            'last_name' => 'required|string_with_max',

            'email' => 'required|string|string_with_max|email|unique:users,email,'.$this->user?->id,
            'avatar' => 'required|string_with_max',

            'role_ids' => 'required|array',
            'role_ids.*' => 'required|exist_validator:roles,id',

            'password' => $passwordRule.'|string|min:6|string_with_max|confirmed',
            'password_confirmation' => $passwordRule.'|string_with_max',
        ];
    }
}
