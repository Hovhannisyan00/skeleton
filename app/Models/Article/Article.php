<?php

namespace App\Models\Article;

use App\Files\HasFileData;
use App\Models\Base\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static joinMl() check "scopeJoinMl()" method in this Model
 * Class Article
 * @package App\Models\Article
 */
class Article extends BaseModel
{
    use HasFileData;

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

    /**
     * Function to return photo
     *
     * @return Model
     */
    public function getPhotoAttribute(): ?Model
    {
        return $this->files('photo')->first();
    }

    /**
     * Function to return formatted publish date
     *
     * @param $value
     * @return string
     */
    public function getPublishDateAttribute($value): string
    {
        return $value ? Carbon::parse($value)->format(getDateFormatFront()) : '';
    }

    /**
     * Function to return formatted release datetime
     *
     * @param $value
     * @return string
     */
    public function getReleaseDatetimeAttribute($value): string
    {
        return $value ? Carbon::parse($value)->format(getDateTimeFormatFront()) : '';
    }

    /**
     * Function to get ml data
     *
     * @return HasMany
     */
    public function mls(): HasMany
    {
        return $this->hasMany(ArticleMls::class);
    }

    /**
     * Function to return current ml
     *
     * @return HasOne
     */
    public function currentMl(): HasOne
    {
        return $this->hasOne(ArticleMls::class)->where('lng_code', currentLanguageCode());
    }
}
