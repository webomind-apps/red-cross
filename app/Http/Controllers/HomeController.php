<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\Balance;
use App\Models\FinancialYear;
use App\Models\MasterPrice;
use App\Models\SchoolData;
use App\Models\SchoolRegistration;
use App\Models\SchoolRegistrationFee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use NumberFormatter;

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

    public function thank_you_page(Request $request)
    {
        // dd($request->all());
        $amount =  $request->amount;
        $email =  $request->email;
        $councellor_email =  $request->councellor_email;
        $school_registration_annual_fee =  $request->school_registration_annual_fee;
        $no_of_students_paid =  $request->no_of_students_paid;
        $school_student_memebership_fee =  $request->school_student_memebership_fee;
        $convenience_amount =  $request->convenience_amount;
        $current_year =  $request->current_year;
        $signature = $request->signature;

        $amountInWords_total_to_be_paid = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($amount));
        $amountInWords_school_registration_annual_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->school_registration_annual_fee));
        $amountInWords_school_student_memebership_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->school_student_memebership_fee));

        $html = '';
        $view = view('admin.invoice.school_invoice', ['name' => $request->school_name, 'address' => $request->address, 'total_to_be_paid' => $amountInWords_total_to_be_paid, 'school_registration_annual_fee' => $amountInWords_school_registration_annual_fee, 'school_student_memebership_fee' => $amountInWords_school_student_memebership_fee, 'signature' => $signature]);
        $html .= $view->render();
        $file = Pdf::loadHTML($html);

        $path = public_path('/pdf');
        $fileName =  $request->amount. '.' . 'pdf' ;
        $file->save($path . '/' . $fileName);

        $subject = 'Red cross payment';
        $body = 'Payment successful';

        $emails = [$request->email, $request->councellor_email];
        Mail::to($emails)->send(new InvoiceMail($subject, $body, $file));


        return view('frontend.thank-you-page', compact('amount', 'email', 'councellor_email', 'current_year','school_registration_annual_fee','no_of_students_paid','school_student_memebership_fee','convenience_amount','fileName'));
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
        },'registration_fees' => function ($query) use ($school) {
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
        },'registration_fees' => function ($query) use ($school) {
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
}

