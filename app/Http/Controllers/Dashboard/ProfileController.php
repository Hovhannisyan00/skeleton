<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Profile\ProfileRequest;
use App\Services\Profile\ProfileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ProfileController extends BaseController
{
    public function __construct(
        ProfileService $service
    ) {
        $this->service = $service;
    }

    public function index(): View
    {
        return $this->dashboardView(
            view: 'profile.index',
            vars: $this->service->getViewData(auth()->id())
        );
    }

    public function update(ProfileRequest $profileRequest, int $id): JsonResponse
    {
        $this->service->update($profileRequest->validated(), $id);

        return $this->sendOkUpdated([
            'redirectUrl' => route('dashboard.profile.index')
        ]);
    }
}
