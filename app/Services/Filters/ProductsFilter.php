<?php

namespace App\Services\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductsFilter
{

    protected array $filters = [
        'searchTerm',
        'category_id'
    ];

    /**
     * @var Builder
     */
    protected Builder $builder;

    /**
     * @var Request|Collection
     */
    protected Request|Collection $request;

    public function init(Builder $builder, Request|Collection $request): self
    {
        $this->builder = $builder;
        $this->request = $request;

        return $this;
    }

    public function get(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        foreach ($this->filters as $filter) {
            $this->{$filter}();
        }

        $this->applySort();

        return $this->builder->paginate($this->request->get('per_page', 10));
    }

    protected function searchTerm(): Builder
    {
        if (!$this->hasFilter('searchTerm')) {
            return $this->builder;
        }

        $term = (string)$this->request->get('filters')['searchTerm'];

        return $this->builder->whereLike('title', '%' . $term . '%')
            ->orWhereLike('description', '%' . $term . '%');
    }

    public function category_id()
    {
        if (!$this->hasFilter('category_id')) {
            return $this->builder;
        }

        $value = (string)$this->request->get('filters')['category_id'];

        return $this->builder->where('category_id', $value);

    }

    protected function applySort()
    {
        if (!$this->hasFilter('sortBy')) {
            return $this->builder;
        }
        $sortByOptions = [
            'recently' => ['sort' => 'created_at', 'direction' => 'desc'],
            'a-z' => ['sort' => 'title', 'direction' => 'asc'],
            'z-a' => ['sort' => 'title', 'direction' => 'desc'],
            'price-asc' => ['sort' => 'price', 'direction' => 'asc'],
            'price-desc' => ['sort' => 'price', 'direction' => 'desc']
        ];

        $sortBy = $this->request->get('filters')['sortBy'];

        if (empty($sortByOptions[$sortBy])) {
            return $this->builder;
        }

        $this->builder->orderBy($sortByOptions[$sortBy]['sort'], $sortByOptions[$sortBy]['direction']);

    }

    /**
     * @param $value
     * @return bool
     */
    protected function hasFilter($value): bool
    {
        return $this->request->has('filters') && !empty($this->request->get('filters')[$value]);
    }


}
