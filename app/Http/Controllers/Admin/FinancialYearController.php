<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialYear;
use Illuminate\Http\Request;

class FinancialYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $financial_year = FinancialYear::first();
        return view('admin.financial-year.index', compact('financial_year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $financial_year = new FinancialYear();
        $financial_year->name = $request->name;
        $financial_year->from_date = $request->from_date;
        $financial_year->to_date = $request->to_date;
        $financial_year->status = $request->status;
        $financial_year->comment = $request->comments;
        $financial_year->save();

        return redirect()->route('admin.financial-year.index')->with('success', 'Financial year added successfully!');
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
        $financial_year = FinancialYear::find($id);
        $financial_year->name = $request->name;
        $financial_year->from_date = $request->from_date;
        $financial_year->to_date = $request->to_date;
        $financial_year->status = $request->status;
        $financial_year->comment = $request->comments;
        $financial_year->save();

        return redirect()->route('admin.financial-year.index')->with('success', 'Financial year added successfully!');
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
