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
