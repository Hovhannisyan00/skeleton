<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\File\IFileRepository;
use App\Http\Requests\File\FileUploadRequest;
use App\Services\File\FileTempService;
use Illuminate\Http\JsonResponse;

class FileController extends BaseController
{
    public function __construct(
        IFileRepository         $repository,
        private FileTempService $fileService
    ) {
        $this->repository = $repository;
    }

    /**
     * Function to store file
     */
    public function storeTempFile(FileUploadRequest $request): JsonResponse
    {
        return response()->json($this->fileService->storeTempFile($request->validated()));
    }

    /**
     * Function to delete file
     */
    public function delete(string $id): JsonResponse
    {
        $this->fileService->deleteFile($id);
        return $this->sendOkDeleted();
    }
}
