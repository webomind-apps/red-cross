<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\JrcExaminationFee;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use Barryvdh\DomPDF\Facade\Pdf;

class JrcExaminationController extends Controller
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

        // dd($request->all());
        $jrc_examination_fee = JrcExaminationFee::create($request->all());

        $name = $request->school_name;
        $address = $request->address;
        $receipt_no = $request->id;
        $total_to_be_paid = $request->total_to_be_paid;
        $transaction_date = $request->transaction_date;
        $jrc_exam_fees = $request->jrc_examination_fee;
        $book_fees = $request->book_fee;

        $html = '';
        $view = view('admin.invoice.invoice', ['name' => $name, 'address' => $address, 'total_to_be_paid' => $total_to_be_paid, 'receipt_no' => $receipt_no, 'transaction_date' => $transaction_date, 'jrc_exam_fees' => $jrc_exam_fees, 'book_fees' => $book_fees]);
        $html .= $view->render();
        $file = Pdf::loadHTML($html);

        $subject = 'Red cross payment';
        $body = 'Payment successful';

        $emails = [$request->email, $request->councellor_email];
        Mail::to($emails)->send(new InvoiceMail($subject, $body, $file));

       
        $input = $request->all();

        $api = new Api('rzp_test_AEKYB9rRlafhix', 'arkh8l6K6tnLx1ap5Go9w8EU');

        $order_details = $api->order->create(array(
            'receipt' => mt_rand(1000000000, 9999999999), 'amount' => $request->total_to_be_paid * 100, 'currency' => 'INR',
            'notes' => array(
                'school_name' => $request->school_name, 'email' => $request->email, 'phone_number' => $request->phone_number,
                'address' => $request->address, 'councellor_email' => $request->councellor_email
            )
        ));

        session(['orderdetails' => $order_details]);

        return redirect()->route('payment-page');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
