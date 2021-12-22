<?php

namespace App\Models\Article;

use App\Models\Base\Search;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ArticleSearch
 * @package App\Models\Article
 */
class ArticleSearch extends Search
{
    /**
     * @var string[]
     */
    protected $orderables = [
        'id',
        'slug',
        'publish_date',
        'created_at'
    ];

    /**
     * @return Builder
     */
    protected function query(): Builder
    {
        $filters = $this->filters;

        return Article::joinTo(ArticleMls::class)->select(
            'id',
            'slug',
            'publish_date',
            'title',
            'created_at'
        )
            ->when(!empty($filters['id']), function ($query) use ($filters) {
                $query->where('id', $filters['id']);
            })
            ->when(!empty($filters['slug']), function ($query) use ($filters) {
                $query->like('slug', $filters['slug']);
            })
            ->when(!empty($filters['created_at']), function ($query) use ($filters) {
                $query->orderBy('created_at', $filters['created_at']);
            });
    }

    /**
     * @return int
     */
    public function totalCount(): int
    {
        return Article::count();
    }

}
