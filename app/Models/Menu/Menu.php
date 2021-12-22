<?php

namespace App\Models\Menu;

use App\Models\Base\BaseModel;
use App\Scopes\Menu\UserMenuScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Menu
 * @package App\Models\Menu
 */
class Menu extends BaseModel
{
    use HasFactory, HasRoles;

    /**
     * @var string
     */
    protected $guard_name = 'web';

    const MENU_TYPE_ADMIN = 'admin';
    const MENU_TYPE_PROFILE = 'profile';

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'group_name',
        'url',
        'icon',
        'show_status',
        'type'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new UserMenuScope());
    }

    /**
     * @param Builder $builder
     */
    public function scopeAdmin(Builder $builder)
    {
        $builder->where('type', self::MENU_TYPE_ADMIN);
    }

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort');
    }
}
