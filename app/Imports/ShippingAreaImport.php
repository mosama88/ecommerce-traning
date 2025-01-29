<?php

namespace App\Imports;

use App\Models\ShippingArea;
use Maatwebsite\Excel\Concerns\ToModel;

class ShippingAreaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ShippingArea([
            //
        ]);
    }
}