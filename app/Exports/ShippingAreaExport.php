<?php

namespace App\Exports;

use App\Models\ShippingArea;
use Maatwebsite\Excel\Concerns\FromCollection;

class ShippingAreaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ShippingArea::all();
    }
}