<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Test\TestRequest;
use App\Http\Requests\Test\TestSearchRequest;
use App\Models\Test\TestSearch;
use App\Models\Test\Test;
use App\Services\Test\TestService;
use App\Contracts\Test\ITestRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;

class TestController extends BaseController
{
    public function __construct(
        TestService $service,
        ITestRepository $repository
    ) {
        $this->service = $service;
        $this->repository = $repository;
    }

    public function index(): View
    {
        return $this->dashboardView('test.index');
    }

    public function getListData(TestSearchRequest $request): array
    {
        $searcher = new TestSearch($request->validated());

        return [
            'recordsTotal' => $searcher->totalCount(),
            'recordsFiltered' => $searcher->filteredCount(),
            'data' => $searcher->search(),
        ];
    }

    public function create(): View
    {
        return $this->dashboardView(
            view: 'test.form',
            vars: $this->service->getViewData()
        );
    }

    public function store(TestRequest $request): JsonResponse
    {
     // For storing relations, sending emails, ...etc(extra functionality) use service
     // $this->service->createOrUpdate($request->validated());
        $this->repository->create($request->validated());

        return $this->sendOkCreated([
            'redirectUrl' => route('dashboard.tests.index')
        ]);
    }

    public function show(Test $test): View
    {
       /* return $this->dashboardView(
           view: 'test.form',
           vars: $this->service->getViewData($test->id),
           viewMode: 'show'
       );*/
    }

    public function edit(Test $test): View
    {
        // For getting other info except current model use service
        /* return $this->dashboardView(
            view: 'test.form',
            vars: $this->service->getViewData($test->id),
            viewMode: 'edit'
        );*/

        return $this->dashboardView(
            view: 'test.form',
            vars: ['test' => $test],
            viewMode: 'edit'
        );
    }

    public function update(TestRequest $request, Test $test): JsonResponse
    {
     // For updating relations, sending emails, ...etc(extra functionality) use service
     // $this->service->createOrUpdate($request->validated(), $test->id);
        $this->repository->update($test->id, $request->validated());

        return $this->sendOkUpdated([
            'redirectUrl' => route('dashboard.tests.index')
        ]);
    }

    public function destroy(Test $test): JsonResponse
    {
     // If deleting other data except model use service
     // $this->service->delete($test->id);
        $this->repository->destroy($test->id);

        return $this->sendOkDeleted();
    }
}
