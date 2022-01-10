<?php

namespace App\Models\Base;

use App\Models\File\File;
use App\Scopes\Base\ActiveScope;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * Class BaseModel
 * @package App\Models
 */
class BaseModel extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    const TRUE = 1;
    const FALSE = 0;

    /**
     * @var string
     */
    const SHOW_STATUS_ACTIVE = '1';
    const SHOW_STATUS_INACTIVE = '2';
    const SHOW_STATUS_DELETED = '0';

    /**
     * @var array
     */
    const SHOW_STATUSES = [
        self::SHOW_STATUS_ACTIVE,
        self::SHOW_STATUS_INACTIVE,
        self::SHOW_STATUS_DELETED
    ];

    /**
     * @var array
     */
    const SHOW_STATUSES_FOR_SELECT = [
        self::SHOW_STATUS_ACTIVE,
        self::SHOW_STATUS_INACTIVE
    ];

    /**
     * @var bool
     */
    public $hasUserInfo = false;

    /**
     * Default all rows check show_status=1 ,disable that check
     * @var bool
     */
    protected static $getOnlyActiveRows = true;

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
     *
     */
    public static function boot()
    {
        parent::boot();

        if (static::$getOnlyActiveRows) {
            static::addGlobalScope(new ActiveScope);
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
     * @param null $fieldName
     * @param null $fileType
     * @return MorphMany
     */
    public function files($fieldName = null, $fileType = null): MorphMany
    {
        return $this->morphMany(File::class, 'fileable')
            ->when($fieldName, function ($query) use ($fieldName) {
                $query->where('field_name', $fieldName);
            })
            ->when($fileType, function ($query) use ($fileType) {
                $query->where('file_type', $fileType);
            });
    }

    /**
     * @param $query
     * @return Builder
     */
    public function scopeJoinMl($query): Builder
    {
        $params = func_get_args();
        $table = $this->getTable();
        $tableMl = $params[1]['t_ml'] ?? Str::singular($table) . '_mls';

        return $query->join($tableMl, function ($query) use ($table, $params, $tableMl) {
            $foreignKey = $params[1]['f_k'] ?? $this->getForeignKey();

            $query->on($tableMl . '.' . $foreignKey, '=', $table . '.id')->where($tableMl . '.lng_code', '=', currentLanguageCode());
        });
    }

    /**
     * @param $query
     * @return Builder
     * @throws BindingResolutionException
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
     * @param $query
     * @param string $mode
     * @return mixed
     */
    public function scopeOrdered($query, string $mode = 'ASC')
    {
        $table = $this->getTable();
        return $query->orderBy($table . '.sort_order', $mode)->orderByDesc($table . '.id');
    }

    /**
     * @return bool
     */
    public function hasShowStatus(): bool
    {
        if (in_array('show_status', $this->getFillable())) {
            return true;
        }

        return false;
    }

    /**
     * @param $query
     * @param array $excludeColumns
     * @return mixed
     */
    public function scopeExclude($query, $excludeColumns = [])
    {
        $selectColumns = array_diff($this->fillable, $excludeColumns);
        $selectColumns[] = 'id';

        return $query->select($selectColumns);
    }
}
