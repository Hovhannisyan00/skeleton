<?php

namespace App\Services\Article;

use App\Contracts\Article\IArticleRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArticleService extends BaseService
{
    public function __construct(
        IArticleRepository $repository
    ) {
        $this->repository = $repository;
    }

    /*public function getViewData(int $id = null): array
    {
        $viewData = parent::getViewData($id);

        //
        return $viewData + [

            ];
    }*/

    /* public function createOrUpdate(array $data, int $id = null): Model
     {
         return DB::transaction(function () use ($data, $id) {
             $article = parent::createOrUpdateWithoutTransaction($data, $id);

             //

             return $article;
         });
     }*/
}
