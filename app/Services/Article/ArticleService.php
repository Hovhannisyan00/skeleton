<?php

namespace App\Services\Article;

use App\Contracts\Article\IArticleRepository;
use App\Services\BaseService;
use App\Services\File\FileService;
use Illuminate\Support\Facades\DB;

/**
 * Class ArticleService
 * @package App\Services\Article
 */
class ArticleService extends BaseService
{
    /**
     * @var FileService
     */
    protected $fileService;

    /**
     * UserService constructor.
     *
     * @param IArticleRepository $repository
     * @param FileService $fileService
     */
    public function __construct(
        IArticleRepository $repository,
        FileService        $fileService
    )
    {
        $this->repository = $repository;
        $this->fileService = $fileService;
    }

    /**
     * Function to create or update article
     *
     * @param $data
     * @param int|null $id
     */
    public function createOrUpdate($data, int $id = null)
    {
        DB::transaction(function () use ($id, $data) {
            $article = $id ? $this->repository->update($id, $data) : $this->repository->create($data);
            $this->repository->saveMl($article, $data['ml']);
            $this->fileService->storeFile($article, $data, config('files.article'));
        });
    }

    /**
     * Function to return view data
     *
     * @param int|null $id
     * @return array
     */
    public function getViewData(int $id = null): array
    {
        $article = $this->repository->find($id);
        $articleMl = $article->mls->keyBy('lng_code');

        return [
            'article' => $article,
            'articleMl' => $articleMl,
        ];
    }

    /**
     * Function to delete article
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $article = $this->repository->find($id);
        $this->fileService->deleteModelFile($article);
        $this->repository->destroy($id);
    }

}
