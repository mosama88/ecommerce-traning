<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class BookFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];
    protected $casts = ['name' => 'en', 'name' => 'ar'];

    public function category($value)
    {
        return $this->whereIn('category_id', $value);
    }

    public function searchName($value)
    {
        return $this->where('name', 'LIKE', "%$value%");
    }

    public function searchPublishYear($value)
    {
        return $this->where('publish_year', 'LIKE', "%$value%");
    }


    public function searchRate($value)
    {
        return $this->where('rate', 'LIKE', "%$value%");
    }

    public function searchPrice($value)
    {
        return $this->where('price', 'LIKE', "%$value%");
    }
    public function searchAuthor($value)
    {
        return $this->where('author_id', '=', $value);
    }


    public function searchPublisher($value)
    {
        return $this->where('publisher_id', '=', $value);
    }
    public function searchCategory($value)
    {
        return $this->where('category_id', '=', $value);
    }
}