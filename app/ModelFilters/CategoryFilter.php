<?php

namespace App\ModelFilters;

use App\Models\Category;
use EloquentFilter\ModelFilter;

class CategoryFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    protected $cast = ['name' => 'ar', 'name' => 'en'];

    public function categoryName($name)
    {
        return $this->where(function ($q) use ($name) {
            return $q->where('name->ar', 'LIKE', "%$name%")->orWhere('name->en', 'LIKE', "%$name%");
        });
    }
}