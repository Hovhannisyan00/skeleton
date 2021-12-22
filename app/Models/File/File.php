<?php

namespace App\Models\File;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends BaseModel
{
    use HasFactory;

    const TYPE_IMAGE = 'image';
    const TYPE_FILE = 'file';

    const TYPES = [
      self::TYPE_IMAGE,
      self::TYPE_FILE,
    ];

    protected $fillable = [
      'file_type',
      'field_name',
      'file_name',
      'dir_prefix',
    ];

    protected $appends = [
        'file_path'
    ];

    /**
     * Function to generate file path
     *
     * @return string
     */
    public function getFilePathAttribute(): string
    {
        return Storage::disk('uploads')
            ->url($this->dir_prefix . '/' . $this->field_name . '/' . $this->file_name);
    }

}
