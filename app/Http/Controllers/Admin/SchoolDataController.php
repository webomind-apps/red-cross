<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SchoolDataExport;
use App\Http\Controllers\Controller;
use App\Imports\SchoolDataImport;
use App\Mail\SendNotificationMail;
use App\Models\EmailTemplate;
use App\Models\FinancialYear;
use App\Models\SchoolData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Calculation\Financial;

class SchoolDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email_templates = EmailTemplate::all();

        $current_year = FinancialYear::where('status', true)->first();
        $school_datas = SchoolData::paginate(25);
        return view('admin.school-data.index', compact('school_datas', 'current_year', 'email_templates'));
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
        $school_data->school_type = $request->school_type;
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
        $school_data = SchoolData::find($id);
        return view('admin.school-data.show', compact('school_data'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school_data = SchoolData::find($id);
        return view('admin.school-data.edit', compact('school_data'));
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
        $school_data = SchoolData::find($id);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school_data = SchoolData::find($id);
        $school_data->delete();
        return redirect()->route('admin.school-data.index');
    }


    public function export()
    {
        return Excel::download(new SchoolDataExport, 'school-data.xlsx');
    }


    public function import()
    {
        $import = Excel::import(new SchoolDataImport, request()->file('file')->store('files'));
        return back()->with('success', 'Excel imported successfully!');
    }

    public function send_bulk_mail(Request $request)
    {
        $schools = json_decode($request->school_ids);
        $template = EmailTemplate::find($request->email_template);
        $subject = $template ? $template->subject : 'Notification circular.';
        $body = $template ? $template->body : 'Please check the website for the latest notification';

        foreach($schools as $key => $school)
        { 
            $school_data = SchoolData::find($school);
            $emails = [$school_data->email, $school_data->councellor_email];
            Mail::to($emails)->send(new SendNotificationMail($subject, $body));
        }
        return back()->with('success', 'Emails sent to the selected schools successfully!');

    }

    public function search(Request $request)
    {
        // dd($request->search);

        $email_templates = EmailTemplate::all();

        $current_year = FinancialYear::where('status', true)->first();
        $school_datas = SchoolData::where('dise_code', $request->search)->paginate(10);
        return view('admin.school-data.index', compact('school_datas', 'current_year', 'email_templates'));

    }

}
