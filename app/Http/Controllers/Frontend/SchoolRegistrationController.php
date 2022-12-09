<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Balance;
use App\Models\SchoolRegistration;
use App\Models\SchoolRegistrationFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SchoolRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $school_registration = new SchoolRegistration();
        $school_registration->school_id = $request->id;
        $school_registration->year_id  = $request->current_year;
        $school_registration->no_of_students_class_eight = $request->no_of_students_class_eight;
        $school_registration->no_of_students_class_nine = $request->no_of_students_class_nine;
        $school_registration->no_of_students_class_ten = $request->no_of_students_class_ten;
        $school_registration->total_students = $request->total_students;
        $school_registration->school_registration_annual_fee = $request->school_registration_annual_fee;
        $school_registration->school_student_memebership_fee = $request->school_student_memebership_fee;
        $school_registration->no_of_students_paid = $request->no_of_students_paid;
        $school_registration->total = $request->total;
        $school_registration->convenience = $request->convenience;
        $school_registration->total_to_be_paid = $request->total_to_be_paid;
        $school_registration->save();

        foreach ($request->year as $key => $year) {

            $school_registration_fee = new SchoolRegistrationFee();
            $school_registration_fee->school_registration_id  = $school_registration->id;
            $school_registration_fee->year_id  = $year;
            $school_registration_fee->total_fees = $request->total_fees[$key];
            $school_registration_fee->paid_amount = $request->paid_amount[$key];
            $school_registration_fee->balance_amount = $request->balance_amount[$key];
            $school_registration_fee->previous_financial_year = $year;
            $school_registration_fee->save();

            $previous_year = Balance::where('year_id', '=', $request->year)->where('school_id', '=', $request->id)->first();
            if ($previous_year) {
                $previous_year->balance = $request->balance_amount[$key];
                $previous_year->save();
            } else {
                $balance = new Balance();
                $balance->year_id = $request->year[$key];
                $balance->school_id = $request->id;
                $balance->balance = $request->balance_amount[$key];
                $balance->save();
            }
        }

       
        return redirect()->route('thank-you');
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
