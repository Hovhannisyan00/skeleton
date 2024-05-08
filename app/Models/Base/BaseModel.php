<?php

namespace App\Models\Base;

use App\Models\Base\Enums\ShowStatus;
use App\Models\Base\Traits\BaseModelScopes;
use App\Models\Base\Traits\ModelHelperFunctions;
use App\Models\Scopes\Base\DeletedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    use ModelHelperFunctions;
    use BaseModelScopes;

    /**
     * @var string
     */
    final public const TRUE = 1;
    final public const FALSE = 0;

    /**
     * In Create/Update or Delete functions save user_id and user_ip values
     * @var bool
     */
    public bool $hasUserInfo = false;

    /**
     * Create function set default values for create data
     * @var array
     */
    public array $defaultValues = [];

    /**
     * Default get all rows (show_status != 0)
     * @var bool
     */
    protected static bool $getNotDeletedRows = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_user_id',
        'created_user_ip',
        'updated_user_id',
        'updated_user_ip',
        'deleted_user_id',
        'deleted_user_ip',
    ];

    /**
     * Function to boot model creating/updating
     */
    public static function boot(): void
    {
        parent::boot();

        if (static::$getNotDeletedRows) {
            static::addGlobalScope(new DeletedScope());
        }

        // Creating
        static::creating(function ($model) {
            if ($model->hasUserInfo) {
                $model->created_user_id = Auth::check() ? Auth::user()->id : 0;
                $model->created_user_ip = request()->ip();
            }
        });

        // Updating
        static::updating(function ($model) {
            if ($model->hasUserInfo) {
                if ($model->show_status == ShowStatus::ACTIVE) {
                    $model->updated_user_id = Auth::check() ? Auth::user()->id : $model->updated_user_id;
                    $model->updated_user_ip = request()->ip();
                } elseif ($model->show_status == ShowStatus::DELETED) {
                    $model->deleted_user_id = Auth::check() ? Auth::user()->id : $model->deleted_user_id;
                    $model->deleted_user_ip = request()->ip();
                }
            }
        });
    }

    /**
     * Function to set file config key
     */
    public function setFileConfigName(): string
    {
        return static::getClassName();
    }
}
