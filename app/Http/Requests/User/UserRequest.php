<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserRequest
 * @package App\Http\Requests\User
 */
class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'first_name' => 'required|string_with_max',
            'last_name' => 'required|string_with_max',
            'email' => 'required|string|string_with_max|email|unique:users,email,' . request()->user,
            'role_ids' => 'required|array',
            'role_ids.*' => 'required|exist_validator:roles,id',
            'signature' => 'required|string_with_max',
        ];

        if (request()->user){
            $rules['password'] = 'nullable|string|min:6|string_with_max|confirmed';
        }else{
            $rules['password'] = "required|string|min:6|string_with_max|confirmed";
        }

        return $rules;
    }
}
