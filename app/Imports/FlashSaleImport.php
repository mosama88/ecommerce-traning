<?php

namespace App\Imports;

use App\Models\FlashSale;
use Maatwebsite\Excel\Concerns\ToModel;

class FlashSaleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FlashSale([
            //
        ]);
    }
}
