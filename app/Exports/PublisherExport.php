<?php

namespace App\Exports;

use App\Models\Author;
use App\Models\Publisher;
use Maatwebsite\Excel\Concerns\FromCollection;

class PublisherExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Publisher::all();
    }
}