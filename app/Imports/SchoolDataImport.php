<?php

namespace App\Imports;

use App\Models\SchoolData;
use Maatwebsite\Excel\Concerns\ToModel;

class SchoolDataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SchoolData([
            
        ]);
    }
}
