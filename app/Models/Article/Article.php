<?php

namespace App\Models\Article;

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
    /**
     * @var string[]
     */
    protected $fillable = [
        'slug',
        'publish_date',
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'publish_date'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:d.m.Y',
        'publish_date' => 'datetime:d.m.Y',
    ];

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
        return Carbon::parse($value)->format('d.m.Y');
    }
}
