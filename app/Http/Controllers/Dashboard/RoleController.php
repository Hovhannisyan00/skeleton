<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\Role\IRoleRepository;
use App\Http\Requests\Role\RoleSearchRequest;
use App\Models\RoleAndPermission\RoleSearch;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    /**
     * @param IRoleRepository $repository
     */
    public function __construct(IRoleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Function to return roles index view
     */
    public function index(): View
    {
        return $this->dashboardView('roles.index');
    }

    /**
     * Function to return users list
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
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
