<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\AdminUser;
use App\Models\Balance;
use App\Models\FinancialYear;
use App\Models\GeneralSecretarySignature;
use App\Models\SchoolData;
use App\Models\SchoolRegistration;
use App\Models\SchoolRegistrationFee;
use App\Models\Temp;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Instamojo\Instamojo;
use NumberFormatter;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

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

        // dd($request);
        $values = new Temp();
        $values->values = json_encode($request->all());
        $values->save();
        // dd(json_encode($request->all()));

        //instamojo payment
        $authType = "user";

        $api = Instamojo::init($authType, [
            'client_id' => 'Zp89nPJBpD7AM91FkjPRzygstvtmoDtGzrfcP7OR',
            'client_secret' => 'pJEjjQnxcaskBvKSkglO0ECj28p66e6E0Rw7I1jSaeaIAylPQNGlPRnXHUc85hP3HTOJrVZrZ7JXKDsPCVUCRPzUNLCde1cjBBeyLqenjkQGACvuFKzz6RU9ZKrN0JmP',
            "username" => 'jrckar',
            "password" => 'Blr@2023'
        ], false);

        try {

            $amount  = (float) $request['total_to_be_paid'];

            $response = $api->createPaymentRequest(array(

                "purpose" => "RED CROSS",
                "amount" => $amount,
                "send_email" => true,
                "email" => $request['email'],
                "buyer_name" => $request['school_name'],
                "phone" => $request['phone_number'],
                "redirect_url" => url('school-payment-page', ['id' => $values->id])
            ));
            header('Location: ' . $response['longurl']);
            exit();
        } catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
    }
    public function payment(Request $request)
    {

        $authType = "user";
        $api = Instamojo::init($authType, [
            'client_id' => 'Zp89nPJBpD7AM91FkjPRzygstvtmoDtGzrfcP7OR',
            'client_secret' => 'pJEjjQnxcaskBvKSkglO0ECj28p66e6E0Rw7I1jSaeaIAylPQNGlPRnXHUc85hP3HTOJrVZrZ7JXKDsPCVUCRPzUNLCde1cjBBeyLqenjkQGACvuFKzz6RU9ZKrN0JmP',
            "username" => 'jrckar',
            "password" => 'Blr@2023'
        ], false);

        try {
            $response = $api->getPaymentRequestDetails($request->payment_request_id);

            if ($response['status'] == 'Completed') {
                return redirect('school-payment-success')->with(['id' => $request->id, 'response' => $request->all()]);
            } else if ($request->payment_status == 'Failed') {
                return redirect('school-payment-fail');
            }
        } catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
    }

    public function thank_you_page(Request $response)
    {

        $current_year_name = FinancialYear::where('status', 1)->first();

        if ($current_year_name) {
            $receipt = SchoolRegistrationFee::where('year_id', $current_year_name->id)->orderBy('receipt_no', 'desc')->first();
            if ($receipt) {
                $receipt_no_1 = $receipt->receipt_no + 1;
                $receipt_no = str_pad($receipt_no_1, 4, 0, STR_PAD_LEFT);
            } else {
                $receipt_no  = str_pad(1, 4, 0, STR_PAD_LEFT);
            }
        }


        $id = session()->get('id');
        $request_1 = Temp::where('id', $id)->first();
        $request = json_decode($request_1->values);

        $payment = (object) session()->get('response');

        $school_data = SchoolData::where('id', $request->id)->first();
        // dd($school_data);
        $school_data->school_type = $request->school_type;
        $school_data->school_name = $request->school_name;
        $school_data->district = $request->district;
        $school_data->taluk = $request->taluk;
        $school_data->pin_code = $request->pin_code;
        $school_data->address = $request->address;
        $school_data->email = $request->email;
        $school_data->phone_number = $request->phone_number;
        $school_data->councellor_name = $request->councellor_name;
        $school_data->councellor_phone = $request->councellor_phone;
        $school_data->councellor_email = $request->councellor_email;
        $school_data->save();

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
            $school_registration->mode_of_payment = $request->mode_of_payment;
            $school_registration->transaction_date = $request->transaction_date;
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
            $school_registration->mode_of_payment = $request->mode_of_payment;
            $school_registration->transaction_date = $request->transaction_date;

            $school_registration->save();
        }



        $amountInWords_total_to_be_paid = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total_to_be_paid));
        $amountInWords_total = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total));
        $amountInWords_school_registration_annual_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->school_registration_annual_fee));
        $amountInWords_school_student_memebership_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->school_student_memebership_fee));

        $receipt = SchoolRegistrationFee::latest()->first();
        $signature = GeneralSecretarySignature::first();
        // $current_year_name = FinancialYear::where('status', 1)->first();

        $html = '';
        $view = view('admin.invoice.school_invoice', [
            'receipt' => $receipt_no,
            'name' => $request->school_name,
            'address' => $request->address, 'total_to_be_paid' => $amountInWords_total,
            'school_registration_annual_fee' => $amountInWords_school_registration_annual_fee,
            'school_student_memebership_fee' => $amountInWords_school_student_memebership_fee,
            'signature' => $signature->signature, 'signature_name' => $signature->name, 'transaction_date' => $request->transaction_date,
            'total' => $amountInWords_total,
            'total_paid' => $request->total,
            'school_registration_annual_fee_amount' => $request->school_registration_annual_fee,
            'school_student_memebership_fee_amount' => $request->school_student_memebership_fee
        ]);

        $html .= $view->render();
        $file = Pdf::loadHTML($html);

        $path = public_path('/pdf');
        $fileName =  $receipt_no . '.' . 'pdf';
        // $filePath =  $path . '/' . $fileName;
        $file->save($path . '/' . $fileName);

        $html1 = '';
        $view1 = view('admin.thank-you-page.school-registration-thank-you', [
            'receipt' => $receipt_no,
            'name' => $request->school_name,
            'address' => $request->address,
            'district' => $request->district,
            'pin_code' => $request->pin_code,
            'taluk' => $request->taluk,
            'signature_name' => $signature->name,
            'school_registration_annual_fee' => $request->school_registration_annual_fee,
            'amountInWords_school_student_memebership_fee' => $amountInWords_school_student_memebership_fee,
            'current_year_name' => $current_year_name->name,
            'transaction_date' => $request->transaction_date,
            'signature' => $signature->signature,
            'signature_name' => $signature->name,
            'total_paid' => $request->total,
            'total' => $amountInWords_total,
        ]);
        $html1 .= $view1->render();
        $file1 = Pdf::loadHTML($html1);

        $path1 = public_path('/thank-you-pdf');
        $fileName1 =  $receipt_no . '.' . 'pdf';
        // $filePath1 =  $path1 . '/' . $fileName1;
        $file1->save($path1 . '/' . $fileName1);


        $html2 = '';
        $view2 = view('admin.payment-form.school-payment', [
            'request' => $request, 'current_year' => $current_year_name->name, 'receipt_no' => $receipt_no

        ]);
        $html2 .= $view2->render();
        $file2 = Pdf::loadHTML($html2);

        $path2 = public_path('/thank-you-pdf');
        $fileName2 =  $receipt_no . '.' . 'pdf';
        // $filePath1 =  $path1 . '/' . $fileName1;
        $file2->save($path2 . '/' . $fileName2);

        foreach ($request->year as $key => $year) {

            $school_registration_fee = new SchoolRegistrationFee();
            $school_registration_fee->school_registration_id  = $school_registration->id;
            $school_registration_fee->year_id  = $year;
            $school_registration_fee->school_id = $request->id;
            $school_registration_fee->razor_payment_id = $payment->payment_id;
            $school_registration_fee->order_id = $payment->payment_request_id;
            $school_registration_fee->receipt_no = $receipt_no;

            // dd($request->year,$request->total_fees);

            if (!is_null($request->total_fees[$key])) {
                // dd($year);
                $school_registration_fee->total_fees = $request->total_fees[$key];
                $school_registration_fee->paid_amount = $request->paid_amount[$key];
                $school_registration_fee->balance_amount = $request->balance_amount[$key];
                $school_registration_fee->invoice_pdf_path = $fileName;
                $school_registration_fee->thankyou_pdf_path = $fileName1;
                $school_registration_fee->form_print_pdf = $fileName2;

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

        $subject = 'Red cross payment';
        $body = "Dear Sir / Madam, <br><br>Your payment towards Junior Red Cross was successful.<br>
        Please find the receipt and thank you letter attached with this mail.<br><br><br>
        Thank you.";

        $emails = [$request->email, $request->councellor_email];
        Mail::to($emails)->send(new InvoiceMail($subject, $body, $file, $file1));


        $admin_mails = AdminUser::select('admin_emails')->where('admin_type', 1)->first();

        if (!is_null($admin_mails)) {
            $admin = explode(',', $admin_mails->admin_emails);
            Mail::to($admin)->send(new InvoiceMail($subject, $body, $file, $file1));
        }

        $amount = $request->total_to_be_paid;
        $email = $request->email;
        $councellor_email = $request->councellor_email;
        $current_year = $request->current_year;
        $school_registration_annual_fee = $request->school_registration_annual_fee;
        $no_of_students_paid = $request->no_of_students_paid;
        $school_student_memebership_fee = $request->school_student_memebership_fee;
        $convenience_amount = $request->convenience;
        $total = $request->total;

        $request_1->delete();

        return view('frontend.thank-you-page', compact('amount', 'email', 'councellor_email', 'current_year', 'school_registration_annual_fee', 'no_of_students_paid', 'school_student_memebership_fee', 'convenience_amount', 'fileName', 'fileName1', 'total'));
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






    public function invoice()
    {
        return view('admin.invoice.school_invoice');
    }
}
