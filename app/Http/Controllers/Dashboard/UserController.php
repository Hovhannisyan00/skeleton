<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\User\IUserRepository;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserSearchRequest;
use App\Models\User\UserSearch;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * Class UserController
 * @package App\Http\Controllers\Dashboard
 */
class UserController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param IUserRepository $repository
     * @param UserService $service
     */
    public function __construct(
        IUserRepository $repository,
        UserService     $service
    )
    {
        parent::__construct($service);
        $this->repository = $repository;
    }

    /**
     * Function to return users index view
     *
     * @return View
     */
    public function index(): View
    {
        return $this->dashboardView('user.index');
    }

    /**
     * Function to return users list
     *
     * @param UserSearchRequest $request
     * @return array
     */
    public function getListData(UserSearchRequest $request): array
    {
        $searcher = new UserSearch($request->validated());

        return [
            'recordsTotal' => $searcher->totalCount(),
            'recordsFiltered' => $searcher->filteredCount(),
            'data' => $searcher->search(),
        ];
    }

    /**
     * Function to return users create view
     *
     * @return View
     */
    public function create(): View
    {
        return $this->dashboardView('user.form', $this->service->getViewData());
    }

    /**
     * Function to create user
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        $this->service->createOrUpdate($request->validated());

        return $this->sendOkCreated([
            'redirectUrl' => route('dashboard.users.index')
        ]);
    }

    /**
     * Function to return users edit view
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return $this->dashboardView('user.form', $this->service->getViewData($id), 'edit');
    }

    /**
     * Function to update user
     *
     * @param UserRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UserRequest $request, int $id): JsonResponse
    {
        $this->service->createOrUpdate($request->validated(), $id);

        return $this->sendOkUpdated([
            'redirectUrl' => route('dashboard.users.index')
        ]);
    }

    /**
     * Function to delete user
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
