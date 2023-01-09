<?php

namespace App\Http\Requests\Article;

use App\Http\Requests\Core\DatatableSearchRequest;

class ArticleSearchRequest extends DatatableSearchRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return parent::rules() + [
                'f.id' => 'nullable|integer_with_max',
                'f.slug' => 'nullable|string_with_max',
                'f.title' => 'nullable|string_with_max',
                'f.description' => 'nullable|string_with_max',
                'f.publish_date' => 'nullable|date',
                'f.show_status' => 'nullable|show_status_validator',
            ];
    }
}
