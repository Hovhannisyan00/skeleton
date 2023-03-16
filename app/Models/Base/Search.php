<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

abstract class Search
{
    /**
     * @var int
     */
    protected int $perPage = 25;

    /**
     * @var int
     */
    protected int $start = 0;

    /**
     * @var array
     */
    protected array $filters = [];

    /**
     * @var array
     */
    protected array $order = [
        ['sort_by' => 'id', 'dir' => 'desc']
    ];

    /**
     * @var string[]
     */
    protected array $orderables = [
        'id',
    ];

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

    abstract protected function query(): Builder;

    protected function setOrdering($query): void
    {
        if (in_array($this->order['sort_by'] ?? '', $this->orderables)) {
            $query->orderBy($this->order['sort_by'], $this->order['sort_desc']);
        }
    }

    protected function setLimits($query): void
    {
        $query
            ->skip($this->start)
            ->take($this->perPage);
    }

    public function search(): Collection
    {
        $query = $this->query();
        $this->setOrdering($query);
        $this->setLimits($query);
        return $this->setReturnData($query);
    }

    public function setReturnData($query): mixed
    {
        return $query->get();
    }

    protected function totalCount(): int
    {
        return 0;
    }

    public function filteredCount(): int
    {
        return $this->query()->count();
    }
}
