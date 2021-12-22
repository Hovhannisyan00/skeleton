<?php

namespace App\Models\Article;

use App\Models\Base\BaseMlModel;
use App\Traits\Models\HasCompositePrimaryKey;

/**
 * Class ArticleMls
 * @package App\Models\Article
 */
class ArticleMls extends BaseMlModel
{
    use HasCompositePrimaryKey;

    /**
     * @var string[]
     */
    protected $primaryKey = ['article_id', 'lng_code'];

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'lng_code',
        'title',
        'meta_title',
        'description',
        'short_description',
        'meta_description',
        'keywords',
    ];
}
