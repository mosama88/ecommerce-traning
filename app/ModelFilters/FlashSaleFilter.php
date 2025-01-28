<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class FlashSaleFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    protected $casts = ['name' => 'ar', 'name' => 'en'];


    public function nameFlash($name)
    {
        return $this->where(function ($q) use ($name) {
            return $q->where('name->ar', 'LIKE', "%$name%")->orWhere('name->en', 'LIKE', "%$name%");
        });
    }




    // public function dateFlash($date_value)
    // {
    //     return $this->where('date', 'LIKE', '%' . $date_value . '%');
    // }

    // public function startTimeFlash($sTime)
    // {
    //     return $this->whereLike('start_time', '%' . $sTime . '%');
    // }

    // public function timeFlash($time_value)
    // {
    //     return $this->where('time', 'LIKE', '%' . $time_value . '%');
    // }

    // public function percentageFlash($percentage_value)
    // {
    //     return $this->where('percentage', 'LIKE', '%' . $percentage_value . '%');
    // }

    // public function is_active_Flash($acive_value)
    // {
    //     return $this->where('is_active', 'LIKE', '%' . $acive_value . '%');
    // }
}
