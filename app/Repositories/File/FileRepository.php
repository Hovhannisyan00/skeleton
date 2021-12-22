<?php

namespace App\Repositories\File;

use App\Contracts\File\IFileRepository;
use App\Models\File\File;
use App\Repositories\BaseRepository;

/**
 * Class FileRepository
 * @package App\Repositories\File
 */
class FileRepository extends BaseRepository implements IFileRepository
{
    /**
     * FileRepository constructor.
     *
     * @param File $model
     */
    public function __construct(File $model)
    {
        parent::__construct($model);
    }
}
