<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\CollegeBalance;
use App\Models\CollegeData;
use App\Models\FinancialYear;
use App\Models\SchoolData;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = FinancialYear::all();

        $total_schools = SchoolData::count();
        $total_colleges = CollegeData::count();

        $year = request()->year;

        $current_year = FinancialYear::where('status', true)->first();

        if (is_null($year)) {

            $balance_amount = Balance::where('year_id', $current_year->id)->sum('balance');
            $paid_amount = Balance::where('year_id', $current_year->id)->sum('amount_to_be_paid');
            $total_schools_paid = Balance::where('year_id', $current_year->id)->where('balance', 0)->count('school_id');
            $total_schools_paid_partially = Balance::where('year_id', $current_year->id)->where('balance', '>', 0)->count('school_id');
            $total_schools_not_paid = $total_schools - $total_schools_paid - $total_schools_paid_partially;


            $college_bal_amount = CollegeBalance::where('year_id', $current_year->id)->sum('balance');
            $college_paid_amount = CollegeBalance::where('year_id', $current_year->id)->sum('amount_to_be_paid');
            $total_colleges_paid = CollegeBalance::where('year_id', $current_year->id)->where('balance', 0)->count('college_id');
            $total_colleges_paid_partially = CollegeBalance::where('year_id', $current_year->id)->where('balance', '>', 0)->count('college_id');
            $total_colleges_not_paid = $total_colleges - $total_colleges_paid - $total_colleges_paid_partially;
        } else {

            $balance_amount = Balance::where('year_id', $year)->sum('balance');
            $paid_amount = Balance::where('year_id', $year)->sum('amount_to_be_paid');
            $total_schools_paid = Balance::where('year_id', $year)->where('balance', 0)->count();
            $total_schools_paid_partially = Balance::where('year_id', $year)->where('balance', '>', 0)->count();
            $total_schools_not_paid = $total_schools - $total_schools_paid - $total_schools_paid_partially;

            $college_bal_amount = CollegeBalance::where('year_id', $year)->sum('balance');
            $college_paid_amount = CollegeBalance::where('year_id', $year)->sum('amount_to_be_paid');
            $total_colleges_paid = CollegeBalance::where('year_id', $year)->where('balance', 0)->count('college_id');
            $total_colleges_paid_partially = CollegeBalance::where('year_id', $year)->where('balance', '>', 0)->count('college_id');
            $total_colleges_not_paid = $total_colleges - $total_colleges_paid - $total_colleges_paid_partially;
        }


        return view('admin.dashboard.index', compact('total_colleges','total_colleges_not_paid','total_colleges_paid_partially','total_colleges_paid','total_colleges_paid','college_paid_amount','college_bal_amount','total_schools_paid', 'total_schools_not_paid', 'paid_amount', 'balance_amount', 'total_schools_paid_partially', 'years', 'total_schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
