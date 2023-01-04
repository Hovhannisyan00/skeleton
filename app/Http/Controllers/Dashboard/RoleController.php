<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\Role\IRoleRepository;
use App\Http\Requests\Role\RoleSearchRequest;
use App\Models\RoleAndPermission\RoleSearch;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Class RoleController
 * @package App\Http\Controllers\Dashboard
 * @todo
 */
class RoleController extends BaseController
{
    /**
     * RoleController constructor.
     *
     * @param IRoleRepository $repository
     */
    public function __construct(IRoleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Function to return roles index view
     *
     * @return View
     */
    public function index(): View
    {
        return $this->dashboardView('roles.index');
    }

    /**
     * Function to return users list
     *
     * @param RoleSearchRequest $request
     * @return array
     */
    public function getListData(RoleSearchRequest $request): array
    {
        $searcher = new RoleSearch($request->validated());

        return [
            'recordsTotal' => $searcher->totalCount(),
            'recordsFiltered' => $searcher->filteredCount(),
            'data' => $searcher->search(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy(int $id)
    {
        //
    }
}
