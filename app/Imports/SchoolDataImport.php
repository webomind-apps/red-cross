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
        // dd($row);
        return new SchoolData([
            'dise_code' => $row['0'],
            'school_name' => $row['1'],
            'district' => $row['2'],
            'taluk' => $row['3'],
            'pin_code' => $row['4'],
            'address' => $row['5'],
            'email' => $row['6'],
            'phone_number' => $row['7'],
            'councellor_name' => $row['8'],
            'councellor_phone' => $row['9'],
            'councellor_email' => $row['10']
        ]);
    }
}
