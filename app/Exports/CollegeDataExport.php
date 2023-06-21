<?php

namespace App\Exports;

use App\Models\CollegeData;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class CollegeDataExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('admin.exports.college_data_export', [
            'collegedatas' => CollegeData::all()
        ]);
    }
}
