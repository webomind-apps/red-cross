<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialYear;
use App\Models\SchoolRegistration;
use App\Models\SchoolRegistrationFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = FinancialYear::all();
        $school_registrations = DB::table('school_data')
            ->join('school_registrations', 'school_registrations.school_id', '=', 'school_data.id')
            ->join('balances', 'balances.school_id', '=', 'school_data.id')
            // ->join('financial_years', '')
            ->paginate(10);
            // ->toSql();
            // dd($school_registrations);

        return view('admin.school-registration-payment.index', compact('school_registrations', 'years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.school-registration-payment.create',);
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
        $school_registration->dise_code = $request->dise_code;
        $school_registration->school_name = $request->school_name;
        $school_registration->district = $request->district;
        $school_registration->taluk = $request->taluk;
        $school_registration->pin_code = $request->pin_code;
        $school_registration->phone_number = $request->phone_number;
        $school_registration->email = $request->email;
        $school_registration->address = $request->address;
        $school_registration->councellor_name = $request->councellor_name;
        $school_registration->councellor_email = $request->councellor_email;
        $school_registration->councellor_phone = $request->councellor_phone;
        $school_registration->no_of_students_class_eight = $request->no_of_students_class_eight;
        $school_registration->no_of_students_class_nine = $request->no_of_students_class_nine;
        $school_registration->no_of_students_class_ten = $request->no_of_students_class_ten;
        $school_registration->total_students = $request->total_students;
        $school_registration->school_registration_annual_fee = $request->school_registration_annual_fee;
        $school_registration->school_student_memebership_fee = $request->school_student_memebership_fee;
        $school_registration->no_of_students_paid = $request->no_of_students_paid;
        $school_registration->mode_of_payment = $request->mode_of_payment;
        $school_registration->payment_method = $request->payment_method;
        $school_registration->transaction_date = $request->transaction_date;
        $school_registration->save();

        $school_registration_fee = new SchoolRegistrationFee();
        $school_registration_fee->school_registration_id  = $school_registration->id;
        $school_registration_fee->year_id  = $request->year;
        $school_registration_fee->total_fees = $request->total_fees;
        $school_registration_fee->paid_amount = $request->paid_amount;
        $school_registration_fee->balance_amount = $request->balance_amount;
        $school_registration_fee->total = $request->total;
        $school_registration_fee->convenience = $request->convenience;
        $school_registration_fee->total_to_be_paid = $request->total_to_be_paid;
        $school_registration_fee->save();

        return redirect()->route('admin.school-registration-payment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school_registration = DB::table('school_data')
            ->join('school_registrations', 'school_registrations.school_id', '=', 'school_data.id')
            ->join('school_registration_fees', 'school_registration_fees.school_registration_id', '=', 'school_registrations.id')
            ->where('school_registration_fees.id', '=', $id)
            ->first();
        return view('admin.school-registration-payment.show', compact('school_registration'));
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
        $school_registration = DB::table('school_data')
            ->join('school_registrations', 'school_registrations.school_id', '=', 'school_data.id')
            ->join('school_registration_fees', 'school_registration_fees.school_registration_id', '=', 'school_registrations.id')
            ->where('school_registration_fees.id', '=', $id);

        $school_registration->delete();

        return redirect()->route('admin.school-registration-payment.index');
    }
}
