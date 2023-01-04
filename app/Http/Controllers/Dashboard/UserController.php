<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\User\IUserRepository;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserSearchRequest;
use App\Models\User\User;
use App\Models\User\UserSearch;
use App\Services\User\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

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
        $this->service = $service;
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
        return $this->dashboardView(view: 'user.form', vars: $this->service->getViewData());
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
     * Function to show user
     *
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return $this->dashboardView(view: 'user.form', vars: $this->service->getViewData($user->id), viewMode: 'show');
    }

    /**
     * Function to return users edit view
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return $this->dashboardView(view: 'user.form', vars: $this->service->getViewData($user->id), viewMode: 'edit');
    }

    /**
     * Function to update user
     *
     * @param UserRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UserRequest $request, User $user): JsonResponse
    {
        $this->service->createOrUpdate($request->validated(), $user->id);

        return $this->sendOkUpdated([
            'redirectUrl' => route('dashboard.users.index')
        ]);
    }

    /**
     * Function to delete user
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $this->service->delete($user->id);
        return $this->sendOkDeleted();
    }
}
