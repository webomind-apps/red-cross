<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JrcExaminationFee;
use Illuminate\Http\Request;

class JrcExamPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jrc_examination_payments = JrcExaminationFee::paginate(10);
        return view('admin.jrc-exam-payment-details.index', compact('jrc_examination_payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jrc-exam-payment-details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jrc_examination_fee = JrcExaminationFee::create($request->all());

        return redirect()->route('admin.jrc-exam-payment-details.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jrc_examination_payment = JrcExaminationFee::find($id);

        return view('admin.jrc-exam-payment-details.show', compact('jrc_examination_payment'));
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
        $jrc_examination_payment = JrcExaminationFee::find($id);

        $jrc_examination_payment->delete();

        return redirect()->route('admin.jrc-exam-payment-details.index');
    }
}
