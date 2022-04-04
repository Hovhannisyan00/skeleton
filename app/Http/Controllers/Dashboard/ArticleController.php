<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Article\ArticleRequest;
use App\Http\Requests\Article\ArticleSearchRequest;
use App\Models\Article\Article;
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
        return $this->dashboardView(view: 'article.form', vars: $this->service->getViewData());
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
     * Function to show article
     *
     * @param Article $article
     * @return View
     */
    public function show(Article $article)
    {
        return $this->dashboardView(view: 'article.form', vars: $this->service->getViewData($article->id), viewMode: 'show');
    }

    /**
     * Function to return article edit view
     *
     * @param Article $article
     * @return View
     */
    public function edit(Article $article): View
    {
        return $this->dashboardView(view: 'article.form', vars: $this->service->getViewData($article->id), viewMode: 'edit');
    }

    /**
     * Function to update article
     *
     * @param ArticleRequest $request
     * @param Article $article
     * @return JsonResponse
     */
    public function update(ArticleRequest $request, Article $article): JsonResponse
    {
        $this->service->createOrUpdate($request->validated(), $article->id);

        return $this->sendOkUpdated([
            'redirectUrl' => route('dashboard.articles.index')
        ]);
    }

    /**
     * Function to delete article
     *
     * @param Article $article
     * @return JsonResponse
     */
    public function destroy(Article $article): JsonResponse
    {
        $this->service->delete($article->id);
        return $this->sendOkDeleted();
    }
}
