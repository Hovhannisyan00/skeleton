<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\Role\IRoleRepository;
use App\Http\Requests\Role\RoleSearchRequest;
use App\Models\RoleAndPermission\RoleSearch;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    public function __construct(IRoleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): View
    {
        return $this->dashboardView('roles.index');
    }

    public function getListData(RoleSearchRequest $request): array
    {
        $searcher = new RoleSearch($request->validated());

        return [
            'recordsTotal' => $searcher->totalCount(),
            'recordsFiltered' => $searcher->filteredCount(),
            'data' => $searcher->search(),
        ];
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(int $id)
    {
        //
    }

    public function edit(int $id)
    {
        //
    }

    public function update(Request $request, int $id)
    {
        //
    }

    public function destroy(int $id)
    {
        //
    }
}
