<?php

namespace App\Http\Requests\Article;

use App\Http\Requests\Core\DatatableSearchRequest;

/**
 * Class ArticleSearchRequest
 * @package App\Http\Requests\Article
 */
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
                'f.publish_date' => 'nullable|date',
            ];
    }
}
