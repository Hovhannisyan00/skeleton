<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $passwordRule = 'required';
        if ($this->user) {
            $passwordRule = 'nullable';
        }

        return [
            'first_name' => 'required|string_with_max',
            'last_name' => 'required|string_with_max',
            'email' => 'required|string|string_with_max|email|unique:users,email,' . $this->user?->id,
            'role_ids' => 'required|array',
            'role_ids.*' => 'required|exist_validator:roles,id',
            'signature' => 'required|string_with_max',
            'password' => $passwordRule . '|string|min:6|string_with_max|confirmed',
        ];
    }
}
