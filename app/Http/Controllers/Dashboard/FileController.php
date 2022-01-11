<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\File\IFileRepository;
use App\Http\Requests\File\FileUploadRequest;
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
        FileService $service
    )
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    public function getConfig($fileConfigKey)
    {
        return config("files.$fileConfigKey");
    }

    /**
     * Function to store file
     *
     * @param FileUploadRequest $request
     * @return JsonResponse
     */
    public function storeTempFile(FileUploadRequest $request): JsonResponse
    {
        return response()->json($this->service->storeTempFile($request->validated()));
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
