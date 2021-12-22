<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Class Search
 * @package App\Models\Base
 */
abstract class Search
{
    /**
     * @var int
     */
    protected $perPage = 25;

    /**
     * @var int
     */
    protected $start = 0;

    /**
     * @var array
     */
    protected $filters = [];

    /**
     * @var array
     */
    protected $order = [
        ['sort_by' => 'id', 'dir' => 'desc']
    ];

    /**
     * @var string[]
     */
    protected $orderables = [
        'id',
    ];

    /**
     * Search constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        if (!empty($data['f'])) {
            $this->filters = $data['f'];
        }

        if (!empty($data['order'])) {
            $this->order = $data['order'];
        }

        if (!empty($data['start'])) {
            $this->start = $data['start'];
        }

        if (!empty($data['perPage'])) {
            $this->perPage = $data['perPage'];
        }
    }

    /**
     * @return Builder
     */
    abstract protected function query(): Builder;

    /**
     * @param $query
     */
    protected function setOrdering($query)
    {
        if (in_array($this->order['sort_by'] ?? '', $this->orderables)) {
            $query->orderBy($this->order['sort_by'], $this->order['sort_desc']);
        }
    }

    /**
     * @param $query
     */
    protected function setLimits($query)
    {
        $query
            ->skip($this->start)
            ->take($this->perPage);
    }

    /**
     * @return array|Collection
     */
    public function search()
    {
        $query = $this->query();
        $this->setOrdering($query);
        $this->setLimits($query);
        return $this->setReturnData($query);
    }

    /**
     * @param $query
     * @return array|Collection
     */
    public function setReturnData($query)
    {
        return $query->get();
    }

    /**
     * @return int
     */
    protected function totalCount(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function filteredCount(): int
    {
        return $this->query()->count();
    }

}
