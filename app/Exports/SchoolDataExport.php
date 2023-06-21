<?php

namespace App\Exports;

use App\Models\SchoolData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SchoolDataExport implements FromView
{
    public function view(): View
    {
        return view('admin.exports.school_data_export', [
            'schooldatas' => SchoolData::all()
        ]);
    }
}
