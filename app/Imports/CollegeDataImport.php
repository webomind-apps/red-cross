<?php

namespace App\Imports;

use App\Models\CollegeData;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CollegeDataImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if ($row->filter()->isNotEmpty()) {
                CollegeData::updateOrCreate([
                    'dise_code' => $row['dise_code'],
                    'college_name' => $row['college_name'],
                    'district' => $row['district'],
                    'taluk' => $row['taluk'],
                    'pin_code' => $row['pin_code'],
                    'address' => $row['address'],
                    'email' => $row['email'],
                    'phone_number' => $row['phone_number'],
                ]);
            }
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
