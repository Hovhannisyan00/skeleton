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
            'photo' => config('files.article.photo.validation'),
            'ml' => 'required|array',
            "ml.en.title" => 'required|string_with_max',
            'ml.en.short_description' => 'required|string_with_max',
            'ml.en.description' => 'required|string|max:5000',
        ];
    }
}
