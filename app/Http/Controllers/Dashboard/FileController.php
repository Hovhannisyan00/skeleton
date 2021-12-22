<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\File\IFileRepository;
use App\Services\File\FileService;
use Illuminate\Http\JsonResponse;

/**
 * Class FileController
 * @package App\Http\Controllers\Dashboard
 */
class FileController extends BaseController
{
    /**
     * FileController constructor.
     *
     * @param IFileRepository $repository
     * @param FileService $service
     */
    public function __construct(
        IFileRepository $repository,
        FileService     $service
    )
    {
        parent::__construct($service);
        $this->repository = $repository;
    }

    /**
     * Function to delete file
     *
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->service->delete($id);
        return $this->sendOkDeleted();
    }
}
