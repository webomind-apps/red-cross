<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CollegeDataExport;
use App\Http\Controllers\Controller;
use App\Imports\CollegeDataImport;
use App\Mail\SendNotificationMail;
use App\Models\CollegeData;
use App\Models\EmailTemplate;
use App\Models\FinancialYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class CollegeDataController extends Controller
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
        $college_datas = CollegeData::paginate(25);
        return view('admin.college-data.index', compact('college_datas', 'current_year', 'email_templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.college-data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $college_data = CollegeData::create($request->all());

        return redirect()->route('admin.college-data.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $college_data = CollegeData::find($id);
        return view('admin.college-data.show', compact('college_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $college_data = CollegeData::find($id);
        return view('admin.college-data.edit', compact('college_data'));
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
        $college_data = CollegeData::findOrFail($id);
        $data = $request->all();
        $college_data->update($data);
        return redirect()->route('admin.college-data.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college_data = CollegeData::find($id);

        $college_data->delete();

        return redirect()->route('admin.college-data.index');
    }


    public function import()
    {
        $import = Excel::import(new CollegeDataImport, request()->file('file')->store('files'));
        return back()->with('success', 'Excel imported successfully!');
    }

    public function export()
    {
        return Excel::download(new CollegeDataExport, 'college-data.xlsx');
    }

    public function send_bulk_mail(Request $request)
    {
        $colleges = json_decode($request->college_ids);
        $template = EmailTemplate::find($request->email_template);
        $subject = $template ? $template->subject : 'Notification circular.';
        $body = $template ? $template->body : 'Please check the website for the latest notification';

        foreach($colleges as $key => $college)
        { 
            $school_data = CollegeData::find($college);
            $emails = [$school_data->email, $school_data->councellor_email];
            Mail::to($emails)->send(new SendNotificationMail($subject, $body));
        }
        return back()->with('success', 'Emails sent to the selected schools successfully!');
    }

    public function search(Request $request)
    {
        $email_templates = EmailTemplate::all();

        $current_year = FinancialYear::where('status', true)->first();
        $college_datas = CollegeData::where('dise_code', $request->search)->paginate(10);
        return view('admin.college-data.index', compact('college_datas', 'current_year', 'email_templates'));

    }
}
