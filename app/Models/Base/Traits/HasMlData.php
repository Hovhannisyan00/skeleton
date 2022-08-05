<?php

namespace App\Models\Base\Traits;

use App\Models\Base\BaseMlModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

trait HasMlData
{
    /**
     * @var string
     */
    private string $mlClassPrefix = 'Mls';

    /**
     * @var BaseMlModel|null
     */
    protected static ?BaseMlModel $mlClass = null;

    /**
     * Function Initialize the trait
     *
     * @return void
     */
    protected function initializeHasMlData()
    {
        $this->initMlClass();
    }

    /**
     * Function to get model current ml data
     *
     * @param $query
     * @return Builder
     */
    public function scopeJoinMl($query): Builder
    {
        $params = func_get_args();
        $table = $this->getTable();
        $tableMl = $params[1]['t_ml'] ?? Str::singular($table) . '_mls';
        $locale = $params[1]['locale'] ?? currentLanguageCode();

        return $query->join($tableMl, function ($query) use ($table, $params, $tableMl, $locale) {
            $foreignKey = $params[1]['f_k'] ?? $this->getForeignKey();

            $query->on($tableMl . '.' . $foreignKey, '=', $table . '.id')->where($tableMl . '.lng_code', '=', $locale);
        });
    }

    /**
     * Function to get ml data
     *
     * @return HasMany
     */
    public function mls(): HasMany
    {
        return $this->hasMany(self::$mlClass);
    }

    /**
     * Function to return current ml
     *
     * @return HasOne
     */
    public function currentMl(): HasOne
    {
        return $this->hasOne(self::$mlClass)->where('lng_code', currentLanguageCode());
    }

    /**
     * Function to init Ml Class
     *
     * @return BaseMlModel
     */
    private function initMlClass(): BaseMlModel
    {
        if (self::$mlClass === null) {
            self::$mlClass = $this->setMlClass();
        }

        return self::$mlClass;
    }

    /**
     * Function to set ml class
     *
     * @return BaseMlModel
     */
    protected function setMlClass(): BaseMlModel
    {
        return app()->make($this->getClassNamespace() . '\\' . class_basename($this) . $this->mlClassPrefix);
    }
}
