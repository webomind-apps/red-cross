<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinancialYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_year = FinancialYear::where('status', 1)->first();
        $financial_years = FinancialYear::paginate(10);
        return view('admin.financial-year.index', compact('financial_years','current_year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.financial-year.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 
            'from_date' => 'required',
            'to_date' =>'required',
            'status' => 'required'
        ]);
        
        FinancialYear::where('status', 1)->update(['status'=> 0]);

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
        $financial_year = FinancialYear::find($id);
        return view('admin.financial-year.edit', compact('financial_year'));
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

        // DB::table('financial_years')->where('status',1)->update(['status' => 0]);
        FinancialYear::where('status', 1)->update(['status'=> 0]);

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
        $financial_year = FinancialYear::find($id);
        $financial_year->delete();

        return redirect()->route('admin.financial-year.index')->with('success', 'Financial year deleted successfully!');
    }
}
