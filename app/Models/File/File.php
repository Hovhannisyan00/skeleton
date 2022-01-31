<?php

namespace App\Models\File;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

/**
 * Class File
 * @package App\Models\File
 */
class File extends BaseModel
{
    use HasFactory;

    /**
     * @var string
     */
    const TYPE_IMAGE = 'image';
    const TYPE_FILE = 'file';

    /**
     * @var array
     */
    const TYPES = [
        self::TYPE_IMAGE,
        self::TYPE_FILE,
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
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
    ];

    /**
     * Function to generate file url
     *
     * @return string
     */
    public function getFileUrlAttribute(): string
    {
        return Storage::disk('uploads')
            ->url($this->dir_prefix . '/' . $this->field_name . '/' . $this->file_name);
    }

    /**
     * Function to generate file path
     *
     * @return string
     */
    public function getFilePathAttribute(): string
    {
        return Storage::disk('uploads')
            ->path($this->dir_prefix . '/' . $this->field_name . '/' . $this->file_name);
    }

}
