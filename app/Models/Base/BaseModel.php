<?php

namespace App\Models\Base;

use App\Models\Base\Traits\ModelHelperFunctions;
use App\Models\Scopes\Base\DeletedScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    use HasFactory;
    use ModelHelperFunctions;

    /**
     * @var string
     */
    public const TRUE = 1;
    public const FALSE = 0;

    /**
     * @var string
     */
    public const SHOW_STATUS_ACTIVE = '1';
    public const SHOW_STATUS_INACTIVE = '2';
    public const SHOW_STATUS_DELETED = '0';

    /**
     * @var array
     */
    public const SHOW_STATUSES = [
        self::SHOW_STATUS_ACTIVE,
        self::SHOW_STATUS_INACTIVE,
        self::SHOW_STATUS_DELETED
    ];

    /**
     * @var array
     */
    public const SHOW_STATUSES_FOR_SELECT = [
        self::SHOW_STATUS_ACTIVE,
        self::SHOW_STATUS_INACTIVE
    ];

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
                if ($model->show_status == self::SHOW_STATUS_ACTIVE) {
                    $model->updated_user_id = Auth::check() ? Auth::user()->id : $model->updated_user_id;
                    $model->updated_user_ip = request()->ip();
                } elseif ($model->show_status == self::SHOW_STATUS_DELETED) {
                    $model->deleted_user_id = Auth::check() ? Auth::user()->id : $model->deleted_user_id;
                    $model->deleted_user_ip = request()->ip();
                }
            }
        });
    }

    /**
     * Function to join tables
     */
    public function scopeJoinTo($query): Builder
    {
        $params = func_get_args()[1];
        $table = $this->getTable();
        $joinTableName = is_array($params) ? $params['t'] : $params;
        $joinTable = app()->make($joinTableName)->getTable();

        return $query->join($joinTable, function ($query) use ($table, $params, $joinTable) {
            $localKey = $params['l_k'] ?? 'id';
            $foreignKey = $params['f_k'] ?? $this->getForeignKey();

            $query->on($joinTable . '.' . $foreignKey, '=', $table . '.' . $localKey);

            if (isset($params['where'])) {
                $query->where($params['where']);
            }
        });
    }

    /**
     * Function to order by sort_order
     */
    public function scopeOrdered($query, string $mode = 'ASC'): Builder
    {
        $table = $this->getTable();
        return $query->orderBy($table . '.sort_order', $mode)->orderByDesc($table . '.id');
    }

    /**
     * Function to exclude select data
     */
    public function scopeExclude($query, array $excludeColumns = []): Builder
    {
        $selectColumns = array_diff($this->fillable, $excludeColumns);
        $selectColumns[] = 'id';

        return $query->select($selectColumns);
    }

    /**
     * Function to get only active data
     */
    public function scopeActive($query): Builder
    {
        $table = $this->getTable();
        return $query->where($table . '.show_status', self::SHOW_STATUS_ACTIVE);
    }

    /**
     * Function to set file config key
     */
    public function setFileConfigName(): string
    {
        return static::getClassName();
    }
}
