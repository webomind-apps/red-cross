<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Mail\JrcExamInvoiceMail;
use App\Models\AdminUser;
use App\Models\CollegeData;
use App\Models\jrc_examinationData;
use App\Models\FinancialYear;
use App\Models\GeneralSecretarySignature;
use App\Models\JrcExamination;
use App\Models\JrcExaminationFee;
use App\Models\SchoolData;
use App\Models\Temp;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Instamojo\Instamojo;
use NumberFormatter;
use Razorpay\Api\Errors\SignatureVerificationError;

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
        // dd($request);

        $values = new Temp();
        $values->values = json_encode($request->all());
        $values->save();

        //instamojo payment
        $authType = "user";

        $api = Instamojo::init($authType, [
            'client_id' => 'Zp89nPJBpD7AM91FkjPRzygstvtmoDtGzrfcP7OR',
            'client_secret' => 'pJEjjQnxcaskBvKSkglO0ECj28p66e6E0Rw7I1jSaeaIAylPQNGlPRnXHUc85hP3HTOJrVZrZ7JXKDsPCVUCRPzUNLCde1cjBBeyLqenjkQGACvuFKzz6RU9ZKrN0JmP',
            "username" => 'jrckar',
            "password" => 'Blr@2023'
        ], false);

        try {
            $response = $api->createPaymentRequest(array(

                "purpose" => "RED CROSS",
                "amount" => number_format($request['total_to_be_paid'], 2),
                "send_email" => true,
                "email" => $request['email'],
                "buyer_name" => $request['school_name'],
                "phone" => $request['phone_number'],
                "redirect_url" => url('jrc-exam-payment-page', ['id' => $values->id])
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
                return redirect('jrc-exam-payment-success')->with(['id' => $request->id, 'response' => $request->all()]);
            } else if ($request->payment_status == 'Failed') {
                return redirect('jrc-exam-payment-fail');
            }
        } catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
    }

    public function thank_you_page(Request $response)
    {

        $id = session()->get('id');
        $request_1 = Temp::where('id', $id)->first();
        $request = json_decode($request_1->values);

        $signature = GeneralSecretarySignature::first();

        $current_year_name = FinancialYear::where('status', 1)->first();

        $receipt = JrcExamination::latest()->first();

        $amountInWords_total_to_be_paid = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total_to_be_paid));
        $amountInWords_total = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total));
        $amountInWords_jrc_exam_fee_amount = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->jrc_examination_fee));
        $amountInWords_book_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->book_fee));


        $html = '';
        $view = view('admin.invoice.jrc_exam_invoice', [
            'receipt' => str_pad($receipt->id, 4, 0, STR_PAD_LEFT),
            'transaction_date' => $request->transaction_date,
            'name' => $request->school_name,
            'address' => $request->address,
            'total' => $amountInWords_total,
            'total_paid' => $request->total,
            'jrc_exam_fee' => $request->jrc_examination_fee,
            'jrc_exam_fee_amount' => $amountInWords_jrc_exam_fee_amount,
            'book_fee' => $request->book_fee,
            'book_fee_amount' =>  $amountInWords_book_fee,
            'total_no_of_students' =>  $request->total_no_of_students,
            'no_of_students_buying_book' =>  $request->no_of_students_buying_book,
            'signature' => $signature->signature

        ]);
        $html .= $view->render();
        $file = Pdf::loadHTML($html);

        $path = public_path('/jrc-exam-pdf');
        $fileName =  $receipt->id . '.' . 'pdf';
        $file->save($path . '/' . $fileName);

        $html1 = '';
        $view1 = view('admin.thank-you-page.jrc-exam-thank-you-page', [
            'receipt' => str_pad($receipt->id, 4, 0, STR_PAD_LEFT),
            'name' => $request->school_name,
            'address' => $request->address,
            'taluk' => $request->taluk,
            'district' => $request->district,
            'pin_code' => $request->pin_code,
        ]);
        $html1 .= $view1->render();
        $file1 = Pdf::loadHTML($html1);

        $path1 = public_path('/jrc-exam-thank-you-pdf');
        $fileName1 =  $receipt->id . '.' . 'pdf';
        $file1->save($path1 . '/' . $fileName1);

        $payment = (object) session()->get('response');


        $jrc_exam_fees = new JrcExamination();
        // $jrc_exam_fees->dise_code = $request->dise_code;
        // $jrc_exam_fees->school_name = $request->school_name;
        // $jrc_exam_fees->district = $request->district;
        // $jrc_exam_fees->taluk = $request->taluk;
        // $jrc_exam_fees->pin_code = $request->pin_code;
        // $jrc_exam_fees->phone_number = $request->phone_number;
        // $jrc_exam_fees->email = $request->email;
        // $jrc_exam_fees->address = $request->address;
        // $jrc_exam_fees->councellor_name = $request->councellor_name;
        // $jrc_exam_fees->councellor_email = $request->councellor_email;
        // $jrc_exam_fees->councellor_phone = $request->councellor_phone;
        if($request->school_id)
        {
            $jrc_exam_fees->school_id =  $request->school_id;
        } 
        if($request->college_id)
        {
            $jrc_exam_fees->college_id =  $request->college_id;
        }
        $jrc_exam_fees->total_no_of_students = $request->total_no_of_students;
        $jrc_exam_fees->jrc_examination_fee = $request->jrc_examination_fee;
        $jrc_exam_fees->total_fee_amount = $request->total_fee_amount;
        $jrc_exam_fees->no_of_students_buying_book = $request->no_of_students_buying_book;
        $jrc_exam_fees->book_fee = $request->book_fee;
        $jrc_exam_fees->total_book_fee = $request->total_book_fee;
        $jrc_exam_fees->total = $request->total;
        $jrc_exam_fees->convenience = $request->convenience;
        $jrc_exam_fees->total_to_be_paid = $request->total_to_be_paid;
        $jrc_exam_fees->mode_of_payment = $request->mode_of_payment;
        // $jrc_exam_fees->payment_method = $request->payment_method;
        $jrc_exam_fees->transaction_date = $request->transaction_date;
        $jrc_exam_fees->year_id = $request->year_id;
        $jrc_exam_fees->razor_payment_id = $payment->payment_id;
        $jrc_exam_fees->order_id = $payment->payment_request_id;
        $jrc_exam_fees->receipt_pdf = $fileName;
        $jrc_exam_fees->thank_you_pdf = $fileName1;
        $jrc_exam_fees->save();

        // dd('paid');

        $subject = 'Red cross payment';
        $body = "Dear Sir / Madam, <br><br>Your payment towards Junior Red Cross was successful.<br>
        Please find the receipt and thank you letter attached with this mail.<br><br><br>
        Thank you.";

        $emails = [$request->email, $request->councellor_email];
        Mail::to($emails)->send(new JrcExamInvoiceMail($subject, $body, $file, $file1));


        $admin_mails = AdminUser::select('admin_emails')->where('admin_type', 2)->first();
        // dd($admin_mails);
        if (!is_null($admin_mails)) {
            $admin = explode(',', $admin_mails->admin_emails);
            Mail::to($admin)->send(new JrcExamInvoiceMail($subject, $body, $file, $file1));
        }


       
        $amount = $request->total_to_be_paid;
        $email = $request->email;
        $councellor_email = $request->councellor_email;
        $current_year = $request->current_year;
        $jrc_examination_fee = $request->jrc_examination_fee;
        $no_of_students_paid = $request->total_no_of_students;
        // $school_student_memebership_fee = $request->school_student_memebership_fee;
        $convenience_amount = $request->convenience;
        $total = $request->total;

        $request_1->delete();

        return view('frontend.thank-you-page', compact('amount', 'email', 'councellor_email', 'current_year', 'jrc_examination_fee', 'no_of_students_paid', 'convenience_amount', 'fileName', 'fileName1', 'total'));

    }



    public function jrc_thank_you_page(Request $payment)
    {


        $request = (object) session()->get('input');

        // dd($payment->all(), $request);
        $jrc_exam_fees = new JrcExaminationFee();
        $jrc_exam_fees->dise_code = $request->dise_code;
        $jrc_exam_fees->school_name = $request->school_name;
        $jrc_exam_fees->district = $request->district;
        $jrc_exam_fees->taluk = $request->taluk;
        $jrc_exam_fees->pin_code = $request->pin_code;
        $jrc_exam_fees->phone_number = $request->phone_number;
        $jrc_exam_fees->email = $request->email;
        $jrc_exam_fees->address = $request->address;
        $jrc_exam_fees->councellor_name = $request->councellor_name;
        $jrc_exam_fees->councellor_email = $request->councellor_email;
        $jrc_exam_fees->councellor_phone = $request->councellor_phone;
        $jrc_exam_fees->total_no_of_students = $request->total_no_of_students;
        $jrc_exam_fees->jrc_examination_fee = $request->jrc_examination_fee;
        $jrc_exam_fees->total_fee_amount = $request->total_fee_amount;
        $jrc_exam_fees->no_of_students_buying_book = $request->no_of_students_buying_book;
        $jrc_exam_fees->book_fee = $request->book_fee;
        $jrc_exam_fees->total_book_fee = $request->total_book_fee;
        $jrc_exam_fees->total = $request->total;
        $jrc_exam_fees->convenience = $request->convenience;
        $jrc_exam_fees->total_to_be_paid = $request->total_to_be_paid;
        $jrc_exam_fees->mode_of_payment = $request->mode_of_payment;
        // $jrc_exam_fees->payment_method = $request->payment_method;
        $jrc_exam_fees->transaction_date = $request->transaction_date;
        $jrc_exam_fees->year_id = $request->year_id;
        $jrc_exam_fees->save();

        $signature = GeneralSecretarySignature::first();

        $current_year_name = FinancialYear::where('status', 1)->first();

        $receipt = JrcExaminationFee::latest()->first();

        $amountInWords_total_to_be_paid = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total_to_be_paid));
        $amountInWords_total = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total));
        $amountInWords_jrc_exam_fee_amount = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->jrc_examination_fee));
        $amountInWords_book_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->book_fee));


        $html = '';
        $view = view('admin.invoice.jrc_exam_invoice', [
            'receipt' => str_pad($receipt->id, 4, 0, STR_PAD_LEFT),
            'transaction_date' => $request->transaction_date,
            'name' => $request->school_name,
            'address' => $request->address,
            'total' => $amountInWords_total,
            'total_paid' => $request->total,
            'jrc_exam_fee' => $request->jrc_examination_fee,
            'jrc_exam_fee_amount' => $amountInWords_jrc_exam_fee_amount,
            'book_fee' => $request->book_fee,
            'book_fee_amount' =>  $amountInWords_book_fee,
            'total_no_of_students' =>  $request->total_no_of_students,
            'no_of_students_buying_book' =>  $request->no_of_students_buying_book,
            'signature' => $signature->signature

        ]);
        $html .= $view->render();
        $file = Pdf::loadHTML($html);

        $path = public_path('/jrc-exam-pdf');
        $fileName =  $receipt->id . '.' . 'pdf';
        $file->save($path . '/' . $fileName);

        $html1 = '';
        $view1 = view('admin.thank-you-page.jrc-exam-thank-you-page', [
            'receipt' => str_pad($receipt->id, 4, 0, STR_PAD_LEFT),
            'name' => $request->school_name,
            'address' => $request->address,
            'taluk' => $request->taluk,
            'district' => $request->district,
            'pin_code' => $request->pin_code,
        ]);
        $html1 .= $view1->render();
        $file1 = Pdf::loadHTML($html1);

        $path1 = public_path('/jrc-exam-thank-you-pdf');
        $fileName1 =  $receipt->id . '.' . 'pdf';
        $file1->save($path1 . '/' . $fileName1);

        $subject = 'Red cross payment';
        $body = "Dear Sir / Madam, <br><br>Your payment towards Junior Red Cross was successful.<br>
        Please find the receipt and thank you letter attached with this mail.<br><br><br>
        Thank you.";

        $emails = [$request->email, $request->councellor_email];
        Mail::to($emails)->send(new JrcExamInvoiceMail($subject, $body, $file, $file1));


        $admin_mails = AdminUser::select('admin_emails')->where('admin_type', 2)->first();
        // dd($admin_mails);
        if (!is_null($admin_mails)) {
            $admin = explode(',', $admin_mails->admin_emails);
            Mail::to($admin)->send(new JrcExamInvoiceMail($subject, $body, $file, $file1));
        }


        return view('frontend.jrc-thank-you-page', compact('fileName1', 'fileName'));
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
    }

    public function data(Request $request)
    {

        $schoolData = SchoolData::where('dise_code', $request->dise)->first();
        $collegeData = CollegeData::where('dise_code', $request->dise)->first();

        if ($schoolData) {
            return response()->json([
                'schoolData' => $schoolData
            ]);
        } else if ($collegeData) {
            return response()->json([
                'collegeData' => $collegeData
            ]);
        } else {
            return response()->json([
                'noData' => 'Dise code not found'
            ]);
        }
    }
}
