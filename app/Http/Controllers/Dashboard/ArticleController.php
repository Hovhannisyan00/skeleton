<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Article\ArticleRequest;
use App\Http\Requests\Article\ArticleSearchRequest;
use App\Models\Article\ArticleSearch;
use App\Services\Article\ArticleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

/**
 * Class ArticleController
 * @package App\Http\Controllers\Dashboard
 */
class ArticleController extends BaseController
{
    /**
     * ArticleController constructor.
     *
     * @param ArticleService $service
     */
    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }

    /**
     * Function to return article index view
     *
     * @return View
     */
    public function index(): View
    {
        return $this->dashboardView('article.index');
    }

    /**
     * Function to return article list
     *
     * @param ArticleSearchRequest $request
     * @return array
     */
    public function getListData(ArticleSearchRequest $request): array
    {
        $searcher = new ArticleSearch($request->validated());

        return [
            'recordsTotal' => $searcher->totalCount(),
            'recordsFiltered' => $searcher->filteredCount(),
            'data' => $searcher->search(),
        ];
    }

    /**
     * Function to return article create view
     *
     * @return View
     */
    public function create(): View
    {
        return $this->dashboardView('article.form');
    }

    /**
     * Function to create article
     *
     * @param ArticleRequest $request
     * @return JsonResponse
     */
    public function store(ArticleRequest $request): JsonResponse
    {
        $this->service->createOrUpdate($request->validated());

        return $this->sendOkCreated([
            'redirectUrl' => route('dashboard.articles.index')
        ]);
    }

    /**
     * Function to return article edit view
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return $this->dashboardView('article.form', $this->service->getViewData($id), 'edit');
    }

    /**
     * Function to update article
     *
     * @param ArticleRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(ArticleRequest $request, int $id): JsonResponse
    {
        $this->service->createOrUpdate($request->validated(), $id);

        return $this->sendOkUpdated([
            'redirectUrl' => route('dashboard.articles.index')
        ]);
    }

    /**
     * Function to delete article
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);
        return $this->sendOkDeleted();
    }
}
