<?php

namespace App\Services\Article;

use App\Contracts\Article\IArticleRepository;
use App\Services\BaseService;

/**
 * Class ArticleService
 * @package App\Services\Article
 */
class ArticleService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param IArticleRepository $repository
     */
    public function __construct(
        IArticleRepository $repository
    )
    {
        $this->repository = $repository;
    }
}
