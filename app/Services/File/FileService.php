<?php

namespace App\Services\File;

use App\Repositories\File\FileRepository;
use App\Services\BaseService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileService
 * @package App\Services\File
 */
abstract class FileService extends BaseService
{
    /**
     * FileService constructor.
     *
     * @param FileRepository $repository
     */
    public function __construct(FileRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Function to delete Model files
     *
     * @param $model
     * @param null $fieldName
     * @return void
     */
    public function deleteModelFile($model, $fieldName = null): void
    {
        $files = $model->files($fieldName)->get();
        if (count($files)) {
            foreach ($files as $file) {
                $this->deleteFilePhysically($file);
            }
            $model->files($fieldName)->delete();
        }
    }

    /**
     * Function to delete file
     *
     * @param int $id
     */
    public function deleteFile(int $id)
    {
        $file = $this->repository->find($id);
        $this->deleteFilePhysically($file);
        $this->repository->destroy($id);
    }

    /**
     * Function to delete file physically
     *
     * @param $file
     */
    private function deleteFilePhysically($file)
    {
        Storage::disk('uploads')->delete($file->dir_prefix . '/' . $file->field_name . '/' . $file->file_name);
    }

    /**
     * Function to move tmp file from pending dir to upload dir
     *
     * @param $fileName
     * @param null $customDirectory
     * @return bool
     */
    protected function movePendingFileToUploadsFolder($fileName, $customDirectory = null): bool
    {
        if (Storage::disk('pending')->exists($customDirectory['pending'])) {
            // convert to full paths
            $fullPathPending = Storage::disk('pending')->getDriver()->getAdapter()->applyPathPrefix($customDirectory['pending']);

            $filePath = isset($customDirectory['uploads']) ? '/' . $customDirectory['uploads'] . '/' . $fileName : $fileName;

            $fullPathUploads = Storage::disk('uploads')->getDriver()->getAdapter()->applyPathPrefix($filePath);

            // make destination folder
            if (!File::exists(dirname($fullPathUploads))) {
                File::makeDirectory(dirname($fullPathUploads), 0755, true);
            }

            return File::move($fullPathPending, $fullPathUploads);
        }

        return false;
    }

    /**
     * Function to get file name
     *
     * @param $file
     * @return string
     */
    protected function getFileName($file): string
    {
        $originalName = $file->getClientOriginalName();
        $filename = basename($originalName, '.' . pathinfo($originalName, PATHINFO_EXTENSION));
        return uniqid() . '_' . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $filename) . '.' . $file->getClientOriginalExtension();
    }

}
