<?php

namespace App\Models\Article;

use App\Models\Base\BaseModel;
use App\Models\Base\Traits\HasFileData;
use App\Models\Base\Traits\HasMlData;
use App\Models\File\File;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Article extends BaseModel
{
    use HasFileData;
    use HasMlData;

    /**
     * in create/update set default values for model
     *
     * @var array
     */
    public array $defaultValues = [];

    /**
     * @var string[]
     */
    protected $fillable = [
        'slug',
        'publish_date',
        'release_date_time',
        'multiple_group_data',
        'multiple_author',
        'show_status'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:d.m.Y',

        'multiple_group_data' => 'array',
        'multiple_author' => 'array',
    ];

//    /**
//     * If custom Ml model open comment and set you model ml
//     * Function to set ml class
//     *
//     * @return BaseMlModel
//     */
//    protected function setMlClass(): BaseMlModel
//    {
//        return new ArticleMls();
//    }

    /**
     * Function to return photo
     *
     * @return MorphOne
     */
    public function photo(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable')->where('field_name', 'photo');
    }

    /**
     * Function to return formatted publish date
     *
     * @return Attribute
     */
    public function publishDate(): Attribute
    {
        return new Attribute(
            get: fn($value) => $value ? Carbon::parse($value)->format(getDateFormatFront()) : '',
        );
    }

    /**
     * Function to return formatted release datetime
     *
     * @return Attribute
     */
    public function releaseDatetime(): Attribute
    {
        return new Attribute(
            get: fn($value) => $value ? Carbon::parse($value)->format(getDateTimeFormatFront()) : ''
        );
    }

}
