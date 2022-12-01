<?php

namespace App\Exports;

use App\Models\SchoolData;
use Maatwebsite\Excel\Concerns\FromCollection;

class SchoolDataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SchoolData::all();
    }
}
