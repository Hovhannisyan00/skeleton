<?php

namespace App\Models\File;

use App\Models\Base\BaseModel;
use App\Models\File\Traits\FileAccessors;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends BaseModel
{
    use HasFactory;
    use FileAccessors;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    public const TYPE_IMAGE = 'image';
    public const TYPE_FILE = 'file';

    /**
     * @var array
     */
    public const TYPES = [
        self::TYPE_IMAGE,
        self::TYPE_FILE,
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'file_type',
        'field_name',
        'file_name',
        'dir_prefix',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'file_path',
        'file_url',
        'file_original_name',
    ];
}
