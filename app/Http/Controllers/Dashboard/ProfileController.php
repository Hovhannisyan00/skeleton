<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Profile\ProfileRequest;
use App\Services\Profile\ProfileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ProfileController extends BaseController
{
    /**
     * @param ProfileService $service
     */
    public function __construct(
        ProfileService $service
    ) {
        $this->service = $service;
    }

    /**
     * Function to show profile page
     */
    public function index(): View
    {
        return $this->dashboardView(view: 'profile.index', vars: $this->service->getViewData(auth()->id()));
    }

    /**
     * Function to update profile data
     */
    public function update(ProfileRequest $profileRequest, int $id): JsonResponse
    {
        $this->service->update($profileRequest->validated(), $id);

        return $this->sendOkUpdated([
            'redirectUrl' => route('dashboard.profile.index')
        ]);
    }
}
