<?php

namespace App\Exports;

use App\Models\SchoolRegistration;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SchoolRegistrationExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.exports.school_registration_export', [
            'schoolregistrations' => DB::table('school_data')
                ->join('school_registrations', 'school_registrations.school_id', '=', 'school_data.id')->get()
        ]);
    }
}
