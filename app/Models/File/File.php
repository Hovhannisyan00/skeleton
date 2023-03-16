<?php

namespace App\Models\File;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class File extends BaseModel
{
    use HasFactory;

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

    /**
     * Function to generate file url
     */
    public function getFileUrlAttribute(): string
    {
        return Storage::disk('uploads')
            ->url($this->dir_prefix . '/' . $this->field_name . '/' . $this->file_name);
    }

    /**
     * Function to generate file path
     */
    public function getFilePathAttribute(): string
    {
        return Storage::disk('uploads')
            ->path($this->dir_prefix . '/' . $this->field_name . '/' . $this->file_name);
    }

    /**
     * Function to get file original name
     */
    public function getFileOriginalNameAttribute(): string
    {
        $explodedFileName = explode('_', $this->file_name, 2);
        return $explodedFileName[1] ?? '';
    }
}
