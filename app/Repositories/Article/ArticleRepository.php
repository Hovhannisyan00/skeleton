<?php

namespace App\Repositories\Article;

use App\Contracts\Article\IArticleRepository;
use App\Models\Article\Article;
use App\Repositories\BaseRepository;

/**
 * Class ArticleRepository
 * @package App\Repositories\Article
 */
class ArticleRepository extends BaseRepository implements IArticleRepository
{
    /**
     * ArticleRepository constructor.
     *
     * @param Article $model
     */
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }
}
