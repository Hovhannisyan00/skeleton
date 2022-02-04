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

    /**
     * @var string
     */
    const MENU_TYPE_ADMIN = 'admin';
    const MENU_TYPE_PROFILE = 'profile';

    /**
     * @var string[]
     */
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
    protected static function booted(): void
    {
        static::addGlobalScope(new UserMenuScope());
    }

    /**
     * Function to get admin type menu
     *
     * @param Builder $builder
     */
    public function scopeAdmin(Builder $builder)
    {
        $builder->where('type', self::MENU_TYPE_ADMIN);
    }

    /**
     * Function to get child menus
     *
     * @return HasMany
     */
    public function subMenu(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort_order');
    }
}
