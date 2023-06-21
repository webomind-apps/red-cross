<?php

namespace App\Imports;

use App\Models\SchoolData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class SchoolDataImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */



    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            // Validator::make($rows->toArray(), [
            //     '*.0' => 'required',
            // ])->validate();

            if ($row->filter()->isNotEmpty()) {
                SchoolData::updateOrCreate([
                    'dise_code' => $row['dise_code'],
                    'school_name' => $row['school_name'],
                    'district' => $row['district'],
                    'taluk' => $row['taluk'],
                    'pin_code' => $row['pin_code'],
                    'address' => $row['address'],
                    'email' => $row['email'],
                    'phone_number' => $row['phone_number'],
                    // 'councellor_name' => $row['councellor_name'],
                    // 'councellor_phone' => $row['councellor_phone'],
                    // 'councellor_email' => $row['councellor_email']
                ]);
            }
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}



