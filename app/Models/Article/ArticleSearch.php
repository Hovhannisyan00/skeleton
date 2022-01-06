<?php

namespace App\Models\Article;

use App\Models\Base\Search;
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
        'title',
        'publish_date',
        'description',
        'created_at'
    ];

    /**
     * @return Builder
     */
    protected function query(): Builder
    {
        $filters = $this->filters;

        return Article::joinMl()->select(
            'id',
            'publish_date',
            'title',
            'description',
            'show_status',
            'created_at'
        )
            ->when(!empty($filters['id']), function ($query) use ($filters) {
                $query->where('id', $filters['id']);
            })
            ->when(!empty($filters['title']), function ($query) use ($filters) {
                $query->like('title', $filters['title']);
            })
            ->when(!empty($filters['description']), function ($query) use ($filters) {
                $query->like('description', $filters['description']);
            })
            ->when(!empty($filters['show_status']), function ($query) use ($filters) {
                $query->where('show_status', $filters['show_status']);
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
