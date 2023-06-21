<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\AdminUser;
use App\Models\Balance;
use App\Models\Circular;
use App\Models\FinancialYear;
use App\Models\GeneralSecretarySignature;
use App\Models\MasterPrice;
use App\Models\SchoolData;
use App\Models\SchoolRegistration;
use App\Models\SchoolRegistrationFee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use NumberFormatter;
use Razorpay\Api\Api;


class HomeController extends Controller
{
    public function index()
    {

        $year = FinancialYear::where('status', '=', 1)->first();

        return view('frontend.index', compact('year'));
    }

    public function jrc_exam_form()
    {
        $year = FinancialYear::where('status', '=', 1)->first();
        return view('frontend.jrc-exam', compact('year'));
    }

    public function thank_you_page(Request $payment)
    {


        // dd($payment->razorpay_signature);
        $request = (object) session()->get('input');

        // dd($request);
        $amount =  $request->total_to_be_paid;
        $email =  $request->email;
        $address =  $request->address;
        $councellor_email =  $request->councellor_email;
        $school_registration_annual_fee =  $request->school_registration_annual_fee;
        $no_of_students_paid =  $request->no_of_students_paid;
        $school_student_memebership_fee =  $request->school_student_memebership_fee;
        $convenience_amount =  $request->convenience_amount;
        $current_year =  $request->current_year;
        $transaction_date = $request->transaction_date;
        $total = $request->total;

        $signature = GeneralSecretarySignature::first();

        $current_year_name = FinancialYear::where('status', 1)->first();

        $order_id = $payment->order_id;
        $razorpay_payment_id = $payment->razorpay_payment_id;
        $razorpay_signature = $payment->razorpay_signature;

        $amountInWords_total_to_be_paid = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($amount));
        $amountInWords_total = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($total));
        $amountInWords_school_registration_annual_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->school_registration_annual_fee));
        $amountInWords_school_student_memebership_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->school_student_memebership_fee));


        //verify payment signature
        $api = new Api('rzp_live_E8hpT2UELTssWx', 'wd3NwAFhXUF6en55tZAHE9Qz');
        $attributes  = array('razorpay_signature'  => $razorpay_signature,  'razorpay_payment_id'  => $razorpay_payment_id,  'razorpay_order_id' => $order_id);
        $order  = $api->utility->verifyPaymentSignature($attributes);

        if (is_null($order)) {
            //insert into db
            $this->insertintodb($request, $payment);
            //payment successfull


            $receipt = DB::table('school_registration_fees')
                ->latest()
                ->first();
            // dd($receipt);
            $html = '';
            $view = view('admin.invoice.school_invoice', [
                'receipt' => str_pad($receipt->id, 4, 0, STR_PAD_LEFT),
                'name' => $request->school_name,
                'address' => $request->address, 'total_to_be_paid' => $amountInWords_total_to_be_paid,
                'school_registration_annual_fee' => $amountInWords_school_registration_annual_fee,
                'school_student_memebership_fee' => $amountInWords_school_student_memebership_fee,
                'signature' => $signature->signature, 'signature_name' => $signature->name, 'transaction_date' => $transaction_date,
                'total' => $amountInWords_total,
                'total_paid' => $request->total,
                'school_registration_annual_fee_amount' => $request->school_registration_annual_fee,
                'school_student_memebership_fee_amount' => $request->school_student_memebership_fee
            ]);
            $html .= $view->render();
            $file = Pdf::loadHTML($html);

            $path = public_path('/pdf');
            $fileName =  random_int(00000, 99999) . '.' . 'pdf';
            $file->save($path . '/' . $fileName);

            $html1 = '';
            $view1 = view('admin.thank-you-page.school-registration-thank-you', [
                'receipt' => str_pad($receipt->id, 4, 0, STR_PAD_LEFT),
                'name' => $request->school_name,
                'address' => $request->address,
                'district' => $request->district,
                'pin_code' => $request->pin_code,
                'taluk' => $request->taluk,
                'signature_name' => $signature->name,
                'school_registration_annual_fee' => $school_registration_annual_fee,
                'amountInWords_school_registration_annual_fee' => $amountInWords_school_registration_annual_fee,
                'current_year_name' => $current_year_name->name,
                'transaction_date' => $transaction_date,
                'signature' => $signature->signature,
                'signature_name' => $signature->name,
                'total_paid' => $request->total,
                'total' => $amountInWords_total,
            ]);
            $html1 .= $view1->render();
            $file1 = Pdf::loadHTML($html1);

            $path1 = public_path('/thank-you-pdf');
            $fileName1 =  random_int(00000, 99999) . '.' . 'pdf';
            $file1->save($path1 . '/' . $fileName1);

            $subject = 'Red cross payment';
            $body = "Dear Sir / Madam, <br><br>Your payment towards Junior Red Cross was successful.<br>
            Please find the receipt and thank you letter attached with this mail.<br><br><br>
            Thank you.";

            $emails = [$request->email, $request->councellor_email];
            Mail::to($emails)->send(new InvoiceMail($subject, $body, $file, $file1));

            
            $admin_mails = AdminUser::select('admin_emails')->where('admin_type', 1)->first();
           
            if(!is_null($admin_mails)){
                $admin = explode(',', $admin_mails->admin_emails);
                Mail::to($admin)->send(new InvoiceMail($subject, $body, $file, $file1));
            }
           

            session()->forget('input');
            // session()->flush();

            return view('frontend.thank-you-page', compact('amount', 'email', 'councellor_email', 'current_year', 'school_registration_annual_fee', 'no_of_students_paid', 'school_student_memebership_fee', 'convenience_amount', 'fileName', 'fileName1', 'total'));
        }
    }

    

    public function insertintodb($request, $payment)
    {
        // dd($request);
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

        // $registration_fee = SchoolRegistration::where('year_id', '=', $request->year)->where('school_id', '=', $request->id)->first();

        foreach ($request->year as $key => $year) {

            $school_registration_fee = new SchoolRegistrationFee();
            $school_registration_fee->school_registration_id  = $school_registration->id;
            $school_registration_fee->year_id  = $year;
            $school_registration_fee->school_id = $request->id;
            $school_registration_fee->razor_payment_id = $payment->razorpay_payment_id;
            $school_registration_fee->order_id = $payment->order_id;

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
    }
    public function data(Request $request)
    {
        $data = SchoolData::where('dise_code', $request->dise)->first();
        return response()->json($data);
    }

    public function master_price_data()
    {
        $data = MasterPrice::first();
        return response()->json($data);
    }
    


    public function year(Request $request)
    {

        $school_registrations = DB::table('school_registration_fees')
            ->join('school_registrations', 'school_registrations.id', '=', 'school_registration_fees.school_registration_id')
            ->where('school_registration_fees.year_id', '=', $request->year)
            ->get();

        return response()->json($school_registrations);
    }


    public function previous_years_data(Request $request)
    {
        $disecode = $request->dise;

        $school =  SchoolData::where('dise_code', $disecode)->first();

        $current_year = FinancialYear::where('status', true)->first();

        $data = FinancialYear::with(['balances' => function ($query) use ($disecode, $school) {
            $query->where('school_id', $school->id)
                ->where('balance', '>', 0);
            $query->whereHas('school', function ($q) use ($disecode) {
                $q->where('dise_code', $disecode);
            });
        }, 'registration_fees' => function ($query) use ($school) {
            $query->where('school_id', $school->id);
        }])
            ->where('status', false)
            ->get();

        $data_fully_paid = FinancialYear::with(['balances' => function ($query) use ($disecode, $school) {
            $query->where('school_id', $school->id)
                ->where('balance', 0);
            $query->whereHas('school', function ($q) use ($disecode) {
                $q->where('dise_code', $disecode);
            });
        }, 'registration_fees' => function ($query) use ($school) {
            $query->where('school_id', $school->id);
        }])
            ->where('status', false)
            ->get();

        $students_data = FinancialYear::with(['registrations' => function ($query) use ($disecode, $school) {
            $query->where('school_id', $school->id);
        }])
            ->where('status', false)
            ->get();


        $balance = Balance::where('year_id', $current_year->id)->where('school_id', $school->id)->first();



        $school_data = SchoolRegistration::where('year_id', $current_year->id)->where('school_id', SchoolData::where('dise_code', $disecode)->first()->id)->first();
        $school_data_previous_payment = SchoolRegistrationFee::where('year_id', $current_year->id)->where('school_id', SchoolData::where('dise_code', $disecode)->first()->id)->get();

        // $payment_data = SchoolRegistrationFee::where('school_id', SchoolData::where('dise_code', $disecode)->first()->id)->orderBy('year_id')->get();

        return response()->json(['financial_years' => $data, 'balance' => $balance, 'school_data' => $school_data, 'students_data' => $students_data, 'school_data_previous_payment' => $school_data_previous_payment, 'data_fully_paid' => $data_fully_paid]);
    }

    public function payment_failed()
    {
        return view('frontend.payment-fail');
    }
    public function circulars()
    {
        $year = FinancialYear::where('status', '=', 1)->first();
        $circulars = Circular::where('status', '=', 1)->get();
        return view('frontend.circulars', compact('circulars', 'year'));
    }
    public function application_guide()
    {
        $year = FinancialYear::where('status', '=', 1)->first();
        return view('frontend.application-guide', compact('year'));
    }

}
