<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SchoolDataExport;
use App\Http\Controllers\Controller;
use App\Imports\SchoolDataImport;
use App\Models\SchoolData;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class SchoolDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school_datas = SchoolData::paginate(10);
        return view('admin.school-data.index', compact('school_datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.school-data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school_data = new SchoolData();
        $school_data->dise_code = $request->dise_code;
        $school_data->school_name = $request->school_name;
        $school_data->district = $request->district;
        $school_data->taluk = $request->taluk;
        $school_data->pin_code = $request->pin_code;
        $school_data->address = $request->address;
        $school_data->email = $request->email;
        $school_data->phone_number = $request->phone;
        $school_data->councellor_name = $request->councellor_name;
        $school_data->councellor_phone = $request->councellor_phone;
        $school_data->councellor_email = $request->councellor_email;
        $school_data->save();

        return redirect()->route('admin.school-data.index');
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


    public function export() 
    {
        return Excel::download(new SchoolDataExport, 'school-data.xlsx');
    }

    public function import()
    {
        Excel::import(new SchoolDataImport, request()->file('file'));

        return back();
    }
}
