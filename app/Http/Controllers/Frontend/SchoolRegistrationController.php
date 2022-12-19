<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Balance;
use App\Models\SchoolRegistration;
use App\Models\SchoolRegistrationFee;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;

class SchoolRegistrationController extends Controller
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

        $school_registration = SchoolRegistration::where('year_id', '=', $request->current_year)->where('school_id', '=', $request->id)->first();

        //    dd($school_registration);
        if ($school_registration) {
            $school_registration->school_id = $request->id;
            $school_registration->year_id  = $request->current_year;
            // $school_registration->no_of_students_class_eight = $request->no_of_students_class_eight;
            $school_registration->no_of_students_class_eight = $school_registration->no_of_students_class_eight;
            $school_registration->no_of_students_class_nine = $school_registration->no_of_students_class_nine;
            $school_registration->no_of_students_class_ten = $school_registration->no_of_students_class_ten;
            $school_registration->total_students = $school_registration->total_students;
            $school_registration->school_registration_annual_fee = $school_registration->school_registration_annual_fee;
            $school_registration->school_student_memebership_fee = $school_registration->school_student_memebership_fee;
            $school_registration->no_of_students_paid = $school_registration->no_of_students_paid;
            $school_registration->total = $request->total;
            $school_registration->convenience = $request->convenience_amount;
            $school_registration->total_to_be_paid = $request->total_to_be_paid;
            $school_registration->save();
        } else {
            $school_registration = new SchoolRegistration();
            $school_registration->school_id = $request->id;
            $school_registration->year_id  = $request->current_year;
            $school_registration->no_of_students_class_eight = $request->no_of_students_class_eight;
            $school_registration->no_of_students_class_nine = $request->no_of_students_class_nine;
            $school_registration->no_of_students_class_ten = $request->no_of_students_class_ten;
            $school_registration->total_students = $request->total_students;
            $school_registration->school_registration_annual_fee = $request->school_registration_annual_fee;
            $school_registration->school_student_memebership_fee = $request->school_student_memebership_fee;
            $school_registration->no_of_students_paid = $request->no_of_students_paid;
            $school_registration->total = $request->total;
            $school_registration->convenience = $request->convenience_amount;
            $school_registration->total_to_be_paid = $request->total_to_be_paid;
            $school_registration->save();
        }

        // $registration_fee = SchoolRegistration::where('year_id', '=', $request->year)->where('school_id', '=', $request->id)->first();

        foreach ($request->year as $key => $year) {

            $school_registration_fee = new SchoolRegistrationFee();
            $school_registration_fee->school_registration_id  = $school_registration->id;
            $school_registration_fee->year_id  = $year;

           // dd($request->year,$request->total_fees);

            if (!is_null($request->total_fees[$key])) {
               // dd($year);
                $school_registration_fee->total_fees = $request->total_fees[$key];
                $school_registration_fee->paid_amount = $request->paid_amount[$key];
                $school_registration_fee->balance_amount = $request->balance_amount[$key];

                $school_registration_fee->previous_financial_year = $year;
                $school_registration_fee->save();

                $previous_year = Balance::where('year_id', $year)->where('school_id', $request->id)->first();

                // dd($previous_year);
                if ($previous_year) {
                    $previous_year->balance = $request->balance_amount[$key];
                    $previous_year->paid_amount = $request->paid_amount[$key];
                    $previous_year->amount_to_be_paid += $request->paid_amount[$key];
                    $previous_year->save();
                } else {
                    $balance = new Balance();
                    $balance->year_id = $request->year[$key];
                    $balance->school_id = $request->id;
                    $balance->total_amount = $request->total_fees[$key];
                    $balance->amount_to_be_paid = $request->paid_amount[$key];
                    $balance->balance = $request->balance_amount[$key];
                    $balance->paid_amount = $request->paid_amount[$key];
                    $balance->save();
                }
            }
        }

        $html = '';
        $view = view('admin.invoice.school_invoice', ['name' => $request->school_name, 'address' => $request->address, 'total_to_be_paid' => $request->total_to_be_paid, 'school_registration_annual_fee' => $request->school_registration_annual_fee, 'school_student_memebership_fee' => $request->school_student_memebership_fee]);
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
            'notes' => array('school_name' => $request->school_name, 'email' => $request->email, 'phone_number' => $request->phone_number,
                             'address' => $request->address, 'councellor_email' => $request->councellor_email, 'current_year'=> $request->current_year
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

    public function payment()
    {
        $order = session('orderdetails');
        return view('admin.payment.payment-page', compact('order'));
    }

    public function payment_success(Request $request)
    {

        $api = new Api('rzp_test_AEKYB9rRlafhix', 'arkh8l6K6tnLx1ap5Go9w8EU');
        $attributes  = array('razorpay_signature'  => $request->razorpay_signature,  'razorpay_payment_id'  => $request->razorpay_payment_id,  'razorpay_order_id' => $request->order_id);
        $order  = $api->utility->verifyPaymentSignature($attributes);

        return response()->json([$request->all(), $order]);
    }

    public function invoice()
    {

        return view('admin.invoice.invoice');
    }
}
