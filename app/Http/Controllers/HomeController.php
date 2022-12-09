<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\FinancialYear;
use App\Models\MasterPrice;
use App\Models\SchoolData;
use App\Models\SchoolRegistration;
use App\Models\SchoolRegistrationFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {


        $year = FinancialYear::where('status', '=', 1)->first();
        return view('frontend.index', compact('year'));
    }

    public function jrc_exam_form()
    {
        return view('frontend.jrc-exam');
    }

    public function thank_you_page()
    {
        return view('frontend.thank-you-page');
    }

    public function data(Request $request)
    {
        $data = SchoolData::where('dise_code', $request->dise)->first();
        return response()->json($data);
    }

    public function master_price_data()
    {
        $data = MasterPrice::first();
        return response()->json($data);
    }
    public function year(Request $request)
    {
        $school_registrations = DB::table('school_registration_fees')
            ->join('school_registrations', 'school_registrations.id', '=', 'school_registration_fees.school_registration_id')
            ->where('school_registration_fees.year_id', '=', $request->year)
            ->get();
        return response()->json($school_registrations);
    }
    public function previous_years_data(Request $request)
    {
        $data = DB::table('school_data')
            ->join('balances', 'balances.school_id', '=', 'school_data.id')
            ->where('dise_code', '=', $request->dise)
            ->get();
        // dd($data);

        // $data = SchoolData::with('balance')->where('dise_code', '=', $request->dise)->get();
        // $data = Balance::with('school')->where('dise_code', '=', $request->dise)->get();
        return response()->json($data);
    }
}
