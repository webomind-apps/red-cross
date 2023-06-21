<?php

namespace App\Http\Controllers;
use App\Models\CollegeBalance;
use App\Models\CollegeData;
use App\Models\CollegeRegistration;
use App\Models\CollegeRegistrationFee;
use App\Models\FinancialYear;
use App\Models\MasterPrice;

use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function previous_years_data(Request $request)
    {
        // dd($request);
        $disecode = $request->dise;

        $college =  CollegeData::where('dise_code', $disecode)->first();

        $current_year = FinancialYear::where('status', true)->first();

        $data = FinancialYear::with(['college_balances' => function ($query) use ($disecode, $college) {
            $query->where('college_id', $college->id)
                ->where('balance', '>', 0);
            $query->whereHas('college', function ($q) use ($disecode) {
                $q->where('dise_code', $disecode);
            });
        }, 'college_registration_fees' => function ($query) use ($college) {
            $query->where('college_id', $college->id);
        }])
            ->where('status', false)
            ->get();

        $data_fully_paid = FinancialYear::with(['college_balances' => function ($query) use ($disecode, $college) {
            $query->where('college_id', $college->id)
                ->where('balance', 0);
            $query->whereHas('college', function ($q) use ($disecode) {
                $q->where('dise_code', $disecode);
            });
        }, 'college_registration_fees' => function ($query) use ($college) {
            $query->where('college_id', $college->id);
        }])
            ->where('status', false)
            ->get();

        $students_data = FinancialYear::with(['college_registrations' => function ($query) use ($disecode, $college) {
            $query->where('college_id', $college->id);
        }])
            ->where('status', false)
            ->get();


        $balance = CollegeBalance::where('year_id', $current_year->id)->where('college_id', $college->id)->first();

        $college_data = CollegeRegistration::where('year_id', $current_year->id)->where('college_id', CollegeData::where('dise_code', $disecode)->first()->id)->first();
        $college_data_previous_payment = CollegeRegistrationFee::where('year_id', $current_year->id)->where('college_id', CollegeData::where('dise_code', $disecode)->first()->id)->get();


        return response()->json(['financial_years' => $data, 'balance' => $balance, 'college_data' => $college_data, 'students_data' => $students_data, 'college_data_previous_payment' => $college_data_previous_payment, 'data_fully_paid' => $data_fully_paid]);
    }
}
