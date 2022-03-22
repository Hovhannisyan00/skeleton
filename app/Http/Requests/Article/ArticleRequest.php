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
            'release_date_time' => 'required|datetime',
            'photo' => 'required|string_with_max',

            'multiple_group_data' => 'nullable|array',
            'multiple_group_data.*.title' => 'nullable|string_with_max',
            'multiple_group_data.*.link' => 'nullable|url|string_with_max',

            'multiple_author' => 'nullable|array',
            'multiple_author.*' => 'nullable|string_with_max',

            'show_status' => 'required|show_status_validator',

            'ml' => 'required|array',
            "ml.*.title" => 'required|string_with_max',
            'ml.*.short_description' => 'required|string_with_max',
            'ml.*.description' => 'required|text_with_max',

            'ml.*.meta_title' => 'nullable|string_with_max',
            'ml.*.meta_keywords' => 'nullable|string_with_max',
            'ml.*.meta_description' => 'nullable|text_with_max',
        ];
    }
}
