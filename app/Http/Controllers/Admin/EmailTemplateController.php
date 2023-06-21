<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Egulias\EmailValidator\Warning\EmailTooLong;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email_templates = EmailTemplate::paginate(10);
        return view('admin.email-templates.index', compact('email_templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.email-templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email_template = new EmailTemplate();
        $email_template->title = $request->name;
        $email_template->subject = $request->subject;
        $email_template->body = $request->email_body;
        // $email_template->emails_to =    $request->emails_to;
        $email_template->save();

        return redirect()->route('admin.email-templates.index');
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
        $email_template = EmailTemplate::find($id);
        return view('admin.email-templates.edit', compact('email_template'));
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
        $email_template = EmailTemplate::find($id);
        $email_template->title = $request->name;
        $email_template->subject = $request->subject;
        $email_template->body = $request->email_body;
        // $email_template->emails_to = $request->emails_to;
        $email_template->save();

        return redirect()->route('admin.email-templates.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email_template = EmailTemplate::find($id);

        $email_template->delete();

        return redirect()->route('admin.email-templates.index');
    }
}
