<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialYear;
use App\Models\MasterPrice;
use Illuminate\Http\Request;

class MasterPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterprice = MasterPrice::first();
        // $financial_year = FinancialYear::first();
        return view('admin.master-price.index', compact('masterprice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master-price.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masterprice =  new MasterPrice();
        $masterprice->school_registration_annual_fee = $request->school_registration_annual_fee;
        $masterprice->school_student_memebership_fee = $request->school_student_memebership_fee;
        $masterprice->college_registration_annual_fee = $request->college_registration_annual_fee;
        $masterprice->college_student_membership_fee = $request->college_student_membership_fee;
        $masterprice->jrc_examination_fee = $request->jrc_examination_fee;
        $masterprice->book_fee = $request->book_fee;
        $masterprice->convenience = $request->convenience;
        $masterprice->save();

        return redirect()->route('admin.master-price.index');
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
        $masterprice = MasterPrice::find($id);
        return view('admin.master-price.edit', compact('masterprice'));
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
        $masterprice = MasterPrice::find($id);
        $masterprice->school_registration_annual_fee = $request->school_registration_annual_fee;
        $masterprice->school_student_memebership_fee = $request->school_student_memebership_fee;
        $masterprice->college_registration_annual_fee = $request->college_registration_annual_fee;
        $masterprice->college_student_membership_fee = $request->college_student_membership_fee;
        $masterprice->jrc_examination_fee = $request->jrc_examination_fee;
        $masterprice->book_fee = $request->book_fee;
        $masterprice->convenience = $request->convenience;
        $masterprice->save();

        return redirect()->route('admin.master-price.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masterprice = MasterPrice::find($id);

        $masterprice->delete();

        return redirect()->route('admin.master-price.index');
    }
}
