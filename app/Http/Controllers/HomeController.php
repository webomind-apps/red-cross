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

        // $data =  SchoolData::where('dise_code', 'sc001')->first()->id;
        // $data =   $current_year = FinancialYear::where('status', true)->first();
        // dd($data);
        $year = FinancialYear::where('status', '=', 1)->first();

        return view('frontend.index', compact('year'));
    }

    public function jrc_exam_form()
    {
        return view('frontend.jrc-exam');
    }

    public function thank_you_page(Request $request)
    {
        // dd($request->all());
        $amount =  $request->amount;
        $email =  $request->email;
        $councellor_email =  $request->councellor_email;
        $current_year =  $request->current_year;
        return view('frontend.thank-you-page', compact('amount', 'email', 'councellor_email', 'current_year'));
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
        $disecode = $request->dise;

        $school =  SchoolData::where('dise_code', $disecode)->first();

        // $data = DB::table('school_data')
        //     ->join('balances', 'balances.school_id', '=', 'school_data.id')
        //     ->join('financial_years', 'financial_years.id', '=', 'balances.year_id')
        //     ->where('school_data.dise_code', '=', $request->dise)
        //     // ->where('financial_years.status', '!=', 1)
        //     ->get();

        $current_year = FinancialYear::where('status', true)->first();

        $data = FinancialYear::with(['balances' => function ($query) use ($disecode, $school) {
            $query->where('school_id', $school->id)
                ->where('balance', '>', 0);
            $query->whereHas('school', function ($q) use ($disecode) {
                $q->where('dise_code', $disecode);
            });
        }])
            ->where('status', false)
            ->get();

        $students_data = FinancialYear::with(['registrations' => function ($query) use ($disecode, $school) {
            $query->where('school_id', $school->id);
        }])
            ->where('status', false)
            ->get();

        // $students_data = FinancialYear::with('registrations')
        //     ->get();

        $balance = Balance::where('year_id', $current_year->id)->where('school_id', $school->id)->first();

        $school_data = SchoolRegistration::where('year_id', $current_year->id)->where('school_id', SchoolData::where('dise_code', $disecode)->first()->id)->first();


        return response()->json(['financial_years' => $data, 'balance' => $balance, 'school_data' => $school_data, 'students_data' => $students_data]);
    }
}
