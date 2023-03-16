<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Article\ArticleRequest;
use App\Http\Requests\Article\ArticleSearchRequest;
use App\Models\Article\Article;
use App\Models\Article\ArticleSearch;
use App\Services\Article\ArticleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ArticleController extends BaseController
{
    public function __construct(
        ArticleService $service
    ) {
        $this->service = $service;
    }

    /**
     * Function to return article index view
     */
    public function index(): View
    {
        return $this->dashboardView('article.index');
    }

    /**
     * Function to return article list
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
     */
    public function create(): View
    {
        return $this->dashboardView(view: 'article.form', vars: $this->service->getViewData());
    }

    /**
     * Function to create article
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
     */
    public function show(Article $article): View
    {
        return $this->dashboardView(
            view: 'article.form',
            vars: $this->service->getViewData($article->id),
            viewMode: 'show'
        );
    }

    /**
     * Function to return article edit view
     */
    public function edit(Article $article): View
    {
        return $this->dashboardView(
            view: 'article.form',
            vars: $this->service->getViewData($article->id),
            viewMode: 'edit'
        );
    }

    /**
     * Function to update article
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
     */
    public function destroy(Article $article): JsonResponse
    {
        $this->service->delete($article->id);
        return $this->sendOkDeleted();
    }
}
