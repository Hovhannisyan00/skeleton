<?php


namespace App\Http\Requests\User;

use App\Http\Requests\Core\DatatableSearchRequest;

/**
 * Class UserSearchRequest
 * @package App\Http\Requests\User
 */
class UserSearchRequest extends DatatableSearchRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return parent::rules() + [
                'f.first_name' => 'nullable|string_with_max',
                'f.last_name' => 'nullable|string_with_max',
                'f.email' => 'nullable|email|string_with_max',
            ];
    }
}
