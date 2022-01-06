<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ArticleRequest
 * @package App\Http\Requests\Article
 */
class ArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'slug' => 'required|string_with_max',
            'publish_date' => 'required|date',
            'photo' => 'required|string_with_max',
            'show_status' => 'required|show_status_validator',

            'ml' => 'required|array',
            "ml.*.title" => 'required|string_with_max',
            'ml.*.short_description' => 'required|string_with_max',
            'ml.*.description' => 'required|string|max:5000',
        ];
    }
}
