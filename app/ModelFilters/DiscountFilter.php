<?php

namespace App\ModelFilters;

use App\Models\Discount;
use EloquentFilter\ModelFilter;

class DiscountFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function discountCode($value)
    {
        return $this->whereLike('code', '%' . $value . '%');
    }

    public function discountQuantity($value)
    {
        return $this->whereLike('quantity', '%' . $value . '%');
    }

    public function discountExpiryDate($value)
    {
        return $this->whereLike('expiry_date', '%' . $value . '%');
    }
}