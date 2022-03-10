<?php

namespace App\Services\File;

use App\Repositories\File\FileRepository;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * Class FileService
 * @package App\Services\File
 */
abstract class FileService
{
    /**
     * @var Filesystem
     */
    protected Filesystem $uploadsDisk;

    /**
     * @var Filesystem
     */
    protected Filesystem $pendingDisk;

    /**
     * FileService constructor.
     *
     * @param FileRepository $repository
     */
    public function __construct(private FileRepository $repository)
    {
        $this->setDisks();
    }

    /**
     * Function to move tmp file from pending dir to upload dir
     *
     * @param string $fileName
     * @param array $config
     * @param array $directoryData
     * @return bool
     */
    protected function movePendingFileToUploadsFolder(string $fileName, array $config = [], array $directoryData = []): bool
    {
        if ($this->pendingDisk->exists($directoryData['pending'])) {

            // convert to full paths
            $fullPathPending = $this->getFilePathPendingDisk($directoryData['pending']);
            $filePath = isset($directoryData['uploads']) ? '/' . $directoryData['uploads'] . '/' . $fileName : $fileName;
            $fullPathUploads = $this->getFilePathUploadsDisk($filePath);

            // make destination folder
            $this->makeDirectory($fullPathUploads);

            // save thumb
            if (isset($config['thumb'])) {
                $this->saveThumb(fileName: $fileName, filePath: $fullPathPending, thumbConfig: $config['thumb'], directoryData: $directoryData);
            }

            return File::move($fullPathPending, $fullPathUploads);
        }

        return false;
    }

    /**
     * Function to save thumb
     *
     * @param string $fileName
     * @param string $filePath
     * @param array $directoryData
     * @param array $thumbConfig
     * @return void
     */
    protected function saveThumb(string $fileName, string $filePath, array $thumbConfig, array $directoryData = []): void
    {
        foreach ($thumbConfig as $thumb) {

            $thumbWidth = $thumb['width'];
            $thumbHeight = $thumb['height'] ?? null;

            $thumbResizePath = $this->getThumbResizePath($thumbWidth, $thumbHeight);

            $fileThumbPath = isset($directoryData['uploads']) ? '/' . $directoryData['uploads'] . '/thumbs/' . "$thumbResizePath/" . $fileName : '/thumbs/' . $fileName;
            $fullThumbPathUploads = $this->getFilePathUploadsDisk($fileThumbPath);

            $this->makeDirectory($fullThumbPathUploads);

            $thumbImage = Image::make($filePath)->resize($thumbWidth, $thumbHeight, function ($constraint) {
                $constraint->aspectRatio();
            });

            $thumbImage->save($fullThumbPathUploads);
        }
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
        if ($files->count()) {
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
     * @return void
     */
    private function deleteFilePhysically($file): void
    {
        $this->uploadsDisk->delete($file->dir_prefix . '/' . $file->field_name . '/' . $file->file_name);

        if ($this->uploadsDisk->exists($file->dir_prefix . '/' . $file->field_name . '/thumbs/')) {

            $config = config("files.$file->dir_prefix.$file->field_name");

            if (isset($config['thumb'])) {
                foreach ($config['thumb'] as $thumb) {

                    $thumbResizePath = $this->getThumbResizePath($thumb['width'], $thumb['height'] ?? null);
                    $thumbFilePath = $file->dir_prefix . '/' . $file->field_name . '/thumbs/' . $thumbResizePath . '/' . $file->file_name;

                    if ($this->uploadsDisk->exists($thumbFilePath)) {
                        $this->uploadsDisk->delete($thumbFilePath);
                    }
                }
            }
        }
    }

    /**
     * Function get thumb resize paths
     *
     * @param string $thumbWidth
     * @param string|null $thumbHeight
     * @return string
     */
    private function getThumbResizePath(string $thumbWidth, ?string $thumbHeight): string
    {
        $thumbResizePath = $thumbWidth;
        if ($thumbHeight) {
            $thumbResizePath .= '_' . $thumbHeight;
        }

        return $thumbResizePath;
    }

    /**
     * Function to get file name
     *
     * @param UploadedFile $file
     * @return string
     */
    protected function getFileName(UploadedFile $file): string
    {
        $originalName = $file->getClientOriginalName();
        $filename = basename($originalName, '.' . pathinfo($originalName, PATHINFO_EXTENSION));
        return uniqid() . '_' . mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $filename) . '.' . $file->getClientOriginalExtension();
    }

    /**
     * Function to make directory
     *
     * @param string $path
     * @return void
     */
    protected function makeDirectory(string $path): void
    {
        if (!File::exists(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }
    }

    /**
     * Function to get file path in uploads disk
     *
     * @param $path
     * @return string
     */
    protected function getFilePathUploadsDisk($path): string
    {
        return $this->uploadsDisk->path($path);
    }

    /**
     * Function to get file path in pending disk
     *
     * @param $path
     * @return string
     */
    protected function getFilePathPendingDisk($path): string
    {
        return $this->pendingDisk->path($path);
    }

    /**
     * Function to set disks
     *
     * @return void
     */
    private function setDisks(): void
    {
        $this->uploadsDisk = Storage::disk('uploads');
        $this->pendingDisk = Storage::disk('pending');
    }
}
