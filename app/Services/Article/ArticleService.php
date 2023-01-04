<?php

namespace App\Services\Article;

use App\Contracts\Article\IArticleRepository;
use App\Services\BaseService;

class ArticleService extends BaseService
{
    /**
     * @param IArticleRepository $repository
     */
    public function __construct(
        IArticleRepository $repository
    )
    {
        $this->repository = $repository;
    }
}
