<?php

namespace App\Exports;

use App\Models\FlashSale;
use Maatwebsite\Excel\Concerns\FromCollection;

class FlashSaleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FlashSale::all();
    }
}
