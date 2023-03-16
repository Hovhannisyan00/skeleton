<?php

namespace App\Models\Menu;

use App\Models\Base\BaseModel;
use App\Models\Scopes\Menu\UserMenuScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

class Menu extends BaseModel
{
    use HasFactory;
    use HasRoles;

    /**
     * @var string
     */
    protected string $guard_name = 'web';

    /**
     * @var string
     */
    public const MENU_TYPE_ADMIN = 'admin';
    public const MENU_TYPE_PROFILE = 'profile';

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
        'type',
        'sort_order',
        'show_status'
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new UserMenuScope());
    }

    /**
     * Function to get admin type menu
     */
    public function scopeAdmin(Builder $builder): void
    {
        $builder->where('type', self::MENU_TYPE_ADMIN);
    }

    /**
     * Function to get child menus
     */
    public function subMenu(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort_order');
    }
}
