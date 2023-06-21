<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\CollegeInvoiceMail;
use App\Mail\InvoiceMail;
use App\Models\AdminUser;
use App\Models\CollegeBalance;
use App\Models\CollegeData;
use App\Models\CollegeRegistration;
use App\Models\CollegeRegistrationFee;
use App\Models\FinancialYear;
use App\Models\GeneralSecretarySignature;
use App\Models\MasterPrice;
use App\Models\Temp;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Instamojo\Instamojo;
use NumberFormatter;
use Razorpay\Api\Api;

class CollegeRegistrationController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = FinancialYear::where('status', '=', 1)->first();

        return view('frontend.college-registration-form', compact('year'));
    }

    public function data(Request $request)
    {

        $collegeData = CollegeData::where('dise_code', $request->dise)->first();
        // $masterPrice = MasterPrice::first();

        return response()->json($collegeData);
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


        $values = new Temp();
        $values->values = json_encode($request->all());
        $values->save();


        //instamojo payment
        $authType = "user";

        $api = Instamojo::init($authType, [
            "client_id" =>  'LvL9LTznsaQCc8GCrkmJVSSLigh0KrW7i9s8RvhB',
            "client_secret" => 'k4lQSjs9pckHP84BaMMtcQdh5kDoyKiluRiYy9FYptpwtNB1zXAj0DyxnqKkSh42aOAC6MBme3zAUBO5ypEh1f3NMho1SVByOvPf8UNeW3xyRcK3nSxSEnCTFdxbOlnX',
            "username" => 'jrcreceiptpucollege',
            /** In case of user based authentication**/
            "password" => 'Blr@2023'
            /** In case of user based authentication**/
        ], false);



        try {
            $amount = (float) $request['total_to_be_paid'];

            $response = $api->createPaymentRequest(array(

                "purpose" => "RED CROSS",
                "amount" => $amount,
                "send_email" => true,
                "email" => $request['email'],
                "buyer_name" => $request['college_name'],
                "phone" => $request['phone_number'],
                "redirect_url" => url('college-payment-page', ['id' => $values->id])
            ));



            header('Location: ' . $response['longurl']);
            exit();
        } catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }

        // session(['input' => $input]);
    }

    public function payment(Request $request)
    {

        $authType = "user";
        $api = Instamojo::init($authType, [
            "client_id" =>  'LvL9LTznsaQCc8GCrkmJVSSLigh0KrW7i9s8RvhB',
            "client_secret" => 'k4lQSjs9pckHP84BaMMtcQdh5kDoyKiluRiYy9FYptpwtNB1zXAj0DyxnqKkSh42aOAC6MBme3zAUBO5ypEh1f3NMho1SVByOvPf8UNeW3xyRcK3nSxSEnCTFdxbOlnX',
            "username" => 'jrcreceiptpucollege',
            /** In case of user based authentication**/
            "password" => 'Blr@2023'
            /** In case of user based authentication**/
        ], false);


        // dd($api);

        try {
            $response = $api->getPaymentRequestDetails($request->payment_request_id);

            if ($response['status'] == 'Completed') {
                return redirect('college-payment-success')->with(['id' => $request->id, 'response' => $request->all()]);
            } else if ($request->payment_status == 'Failed') {
                return redirect('college-payment-fail');
            }
        } catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
    }


    public function thank_you_page(Request $response)
    {

        $current_year_name = FinancialYear::where('status', 1)->first();

        if ($current_year_name) {
            $receipt = CollegeRegistrationFee::where('year_id', $current_year_name->id)->orderBy('receipt_no', 'desc')->first();
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

        $college_data = CollegeData::where('id', $request->id)->first();
        $college_data->college_type = $request->college_type;
        $college_data->college_name = $request->college_name;
        $college_data->district = $request->district;
        $college_data->taluk = $request->taluk;
        $college_data->pin_code = $request->pin_code;
        $college_data->address = $request->address;
        $college_data->email = $request->email;
        $college_data->phone_number = $request->phone_number;
        $college_data->councellor_name = $request->councellor_name;
        $college_data->councellor_phone = $request->councellor_phone;
        $college_data->councellor_email = $request->councellor_email;
        $college_data->save();

        $college_registration = CollegeRegistration::where('year_id', '=', $request->current_year)->where('college_id', '=', $request->id)->first();

        if ($college_registration) {
            $college_registration->college_id = $request->id;
            $college_registration->year_id  = $request->current_year;
            $college_registration->no_of_students_in_first_puc = $college_registration->no_of_students_in_first_puc;
            $college_registration->no_of_students_in_second_puc = $college_registration->no_of_students_in_second_puc;
            $college_registration->total_students = $college_registration->total_students;
            $college_registration->college_registration_annual_fee = $college_registration->college_registration_annual_fee;
            $college_registration->college_student_membership_fee = $college_registration->college_student_membership_fee;
            $college_registration->no_of_students_paid = $college_registration->no_of_students_paid;
            $college_registration->total = $request->total;
            $college_registration->convenience = $request->convenience_amount;
            $college_registration->total_to_be_paid = $request->total_to_be_paid;
            $college_registration->mode_of_payment = $request->mode_of_payment;
            $college_registration->transaction_date = $request->transaction_date;
            $college_registration->save();
        } else {
            $college_registration = new CollegeRegistration();
            $college_registration->college_id = $request->id;
            $college_registration->year_id  = $request->current_year;
            $college_registration->no_of_students_in_first_puc = $request->no_of_students_first_puc;
            $college_registration->no_of_students_in_second_puc = $request->no_of_students_second_puc;
            $college_registration->total_students = $request->total_students;
            $college_registration->college_registration_annual_fee = $request->college_registration_annual_fee;
            $college_registration->college_student_membership_fee = $request->college_student_memebership_fee;
            $college_registration->no_of_students_paid = $request->no_of_students_paid;
            $college_registration->total = $request->total;
            $college_registration->convenience = $request->convenience_amount;
            $college_registration->total_to_be_paid = $request->total_to_be_paid;
            $college_registration->mode_of_payment = $request->mode_of_payment;
            $college_registration->transaction_date = $request->transaction_date;
            $college_registration->save();
        }

        $college_student_membership_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total_to_be_paid));
        $amountInWords_total = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total));
        $amountInWords_college_registration_annual_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->college_registration_annual_fee));
        $amountInWords_college_student_memebership_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->college_student_memebership_fee));

        $receipt = CollegeRegistrationFee::latest()->first();
        $signature = GeneralSecretarySignature::first();
        $current_year_name = FinancialYear::where('status', 1)->first();


        $html = '';
        $view = view('admin.invoice.college_invoice', [
            'receipt' => $receipt_no,
            'name' => $request->college_name,
            'address' => $request->address, 'total_to_be_paid' => $amountInWords_total,
            'college_registration_annual_fee' => $amountInWords_college_registration_annual_fee,
            'college_student_memebership_fee' => $amountInWords_college_student_memebership_fee,
            'signature' => $signature->signature, 'signature_name' => $signature->name, 'transaction_date' => $request->transaction_date,
            'total' => $amountInWords_total,
            'total_paid' => $request->total,
            'college_registration_annual_fee_amount' => $request->college_registration_annual_fee,
            'college_student_memebership_fee_amount' => $request->college_student_memebership_fee
        ]);
        $html .= $view->render();
        $file = Pdf::loadHTML($html);

        $path = public_path('/college-pdf');
        $fileName =  $receipt_no . '.' . 'pdf';
        $file->save($path . '/' . $fileName);

        $html1 = '';
        $view1 = view('admin.thank-you-page.college-registration-thank-you', [
            'receipt' => $receipt_no,
            'name' => $request->college_name,
            'address' => $request->address,
            'district' => $request->district,
            'pin_code' => $request->pin_code,
            'taluk' => $request->taluk,
            'signature_name' => $signature->name,
            'college_registration_annual_fee' => $request->college_registration_annual_fee,
            'amountInWords_college_student_memebership_fee' => $amountInWords_college_student_memebership_fee,
            'current_year_name' => $current_year_name->name,
            'transaction_date' => $request->transaction_date,
            'signature' => $signature->signature,
            'signature_name' => $signature->name,
            'total_paid' => $request->total,
            'total' => $amountInWords_total,
        ]);
        $html1 .= $view1->render();
        $file1 = Pdf::loadHTML($html1);

        $path1 = public_path('/college-thank-you-pdf');
        $fileName1 =  $receipt_no . '.' . 'pdf';
        $file1->save($path1 . '/' . $fileName1);

        //form print
        $html2 = '';
        $view2 = view('admin.payment-form.college-payment', [
            'request' => $request, 'current_year' => $current_year_name->name, 'receipt_no' => $receipt_no

        ]);
        $html2 .= $view2->render();
        $file2 = Pdf::loadHTML($html2);

        $path2 = public_path('/payment-form-pdf');
        $fileName2 =  $request->id . '.' . 'pdf';
        // $filePath1 =  $path1 . '/' . $fileName1;
        $file2->save($path2 . '/' . $fileName2);


        foreach ($request->year as $key => $year) {

            $college_registration_fee = new CollegeRegistrationFee();
            $college_registration_fee->college_registration_id  = $college_registration->id;
            $college_registration_fee->year_id  = $year;
            $college_registration_fee->college_id = $request->id;
            $college_registration_fee->razor_payment_id = $payment->payment_id;
            $college_registration_fee->order_id = $payment->payment_request_id;
            $college_registration_fee->receipt_no = $receipt_no;


            if (!is_null($request->total_fees[$key])) {
                $college_registration_fee->total_fees = $request->total_fees[$key];
                $college_registration_fee->paid_amount = $request->paid_amount[$key];
                $college_registration_fee->balance_amount = $request->balance_amount[$key];
                $college_registration_fee->invoice_pdf_path = $fileName;
                $college_registration_fee->thankyou_pdf_path = $fileName1;
                $college_registration_fee->form_print_pdf = $fileName2;

                $college_registration_fee->previous_financial_year = $year;
                $college_registration_fee->save();

                $previous_year = CollegeBalance::where('year_id', $year)->where('college_id', $request->id)->first();

                if ($previous_year) {
                    $previous_year->balance = $request->balance_amount[$key];
                    $previous_year->paid_amount = $request->paid_amount[$key];
                    $previous_year->amount_to_be_paid += $request->paid_amount[$key];
                    $previous_year->save();
                } else {
                    $balance = new CollegeBalance();
                    $balance->year_id = $request->year[$key];
                    $balance->college_id = $request->id;
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
        Mail::to($emails)->send(new CollegeInvoiceMail($subject, $body, $file, $file1));


        $admin_mails = AdminUser::select('admin_emails')->where('admin_type', 0)->first();

        if (!is_null($admin_mails)) {
            $admin = explode(',', $admin_mails->admin_emails);
            Mail::to($admin)->send(new CollegeInvoiceMail($subject, $body, $file, $file1));
        }

        $amount = $request->total_to_be_paid;
        $email = $request->email;
        $councellor_email = $request->councellor_email;
        $current_year = $request->current_year;
        $college_registration_annual_fee = $request->college_registration_annual_fee;
        $no_of_students_paid = $request->no_of_students_paid;
        $college_student_memebership_fee = $request->college_student_memebership_fee;
        $convenience_amount = $request->convenience;
        $total = $request->total;

        $request_1->delete();

        return view('frontend.college-thank-you-page', compact('amount', 'email', 'councellor_email', 'current_year', 'college_registration_annual_fee', 'no_of_students_paid', 'college_student_memebership_fee', 'convenience_amount', 'fileName', 'fileName1', 'total'));
    }


    public function payment_fail()
    {
        return redirect()->route('payment-failed');
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
}
