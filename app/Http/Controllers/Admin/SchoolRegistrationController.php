<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SchoolRegistrationExport;
use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\AdminUser;
use App\Models\Balance;
use App\Models\EmailTemplate;
use App\Models\FinancialYear;
use App\Models\GeneralSecretarySignature;
use App\Models\SchoolData;
use App\Models\SchoolRegistration;
use App\Models\SchoolRegistrationFee;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use NumberFormatter;

class SchoolRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = request()->year;
        $school = request()->school;
        $district = request()->district;
        // dd($district);
        $years = FinancialYear::all();
        $schools = SchoolData::all();
        $districts = SchoolData::distinct()->get(['district']);

        $current_year = FinancialYear::where('status', true)->first();

        // dd($current_year->id);

        if (is_null($year) && is_null($school) && is_null($district)) {
            $school_registrations = DB::table('balances')
                ->join('school_data', 'school_data.id', '=', 'balances.school_id')
                ->join('financial_years', 'financial_years.id', '=', 'balances.year_id')
                ->where('balances.year_id', $current_year->id)
                ->orderBy('balances.created_at', 'desc')
                ->paginate(25);
        } else if ($year) {
            $school_registrations = DB::table('balances')
                ->join('school_data', 'school_data.id', '=', 'balances.school_id')
                ->join('financial_years', 'financial_years.id', '=', 'balances.year_id')
                ->where('balances.year_id', $year)
                ->orderBy('balances.created_at', 'desc')
                ->paginate(25);
        } else if ($school) {
            $school_registrations = DB::table('balances')
                ->join('school_data', 'school_data.id', '=', 'balances.school_id')
                ->join('financial_years', 'financial_years.id', '=', 'balances.year_id')
                ->where('school_id', $school)
                ->orderBy('balances.created_at', 'desc')
                ->paginate(25);
        } else if ($district) {
            $school_registrations = DB::table('balances')
                ->join('school_data', 'school_data.id', '=', 'balances.school_id')
                ->join('financial_years', 'financial_years.id', '=', 'balances.year_id')
                ->where('district', $district)
                ->orderBy('balances.created_at', 'desc')
                ->paginate(25);
        }

        return view('admin.school-registration-payment.index', compact('school_registrations', 'years', 'schools', 'current_year', 'districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = FinancialYear::where('status', '=', 1)->first();
        return view('admin.school-registration-payment.create', compact('year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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



        $school_data = SchoolData::where('id', $request->id)->first();

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

            $date = Carbon::createFromFormat('Y-m-d', $request->input('transaction_date'))->format('d-m-Y');
            $school_registration->transaction_date = $date;
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
            $date = Carbon::createFromFormat('Y-m-d', $request->input('transaction_date'))->format('d-m-Y');
            $school_registration->transaction_date = $date;
            $school_registration->save();
        }


        $amountInWords_total_to_be_paid = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total_to_be_paid));
        $amountInWords_total = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total));
        $amountInWords_school_registration_annual_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->school_registration_annual_fee));
        $amountInWords_school_student_memebership_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->school_student_memebership_fee));

        $receipt = SchoolRegistrationFee::latest()->first();
        $signature = GeneralSecretarySignature::first();


        $date = Carbon::createFromFormat('Y-m-d', $request->input('transaction_date'))->format('d-m-Y');

        $html = '';
        $view = view('admin.invoice.school_invoice', [
            'receipt' => $receipt_no,
            'name' => $request->school_name,
            'address' => $request->address, 'total_to_be_paid' => $amountInWords_total,
            'school_registration_annual_fee' => $amountInWords_school_registration_annual_fee,
            'school_student_memebership_fee' => $amountInWords_school_student_memebership_fee,
            'signature' => $signature->signature, 'signature_name' => $signature->name, 'transaction_date' =>  $date,
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
            'transaction_date' =>  $date,
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

        //form print
        $html2 = '';
        $view2 = view('admin.payment-form.school-payment', [
            'request' => $request, 'current_year' => $current_year_name->name, 'receipt_no' => $receipt_no

        ]);
        $html2 .= $view2->render();
        $file2 = Pdf::loadHTML($html2);

        $path2 = public_path('/school-payment-form-pdf');
        $fileName2 =  $request->id . '.' . 'pdf';
        // $filePath1 =  $path1 . '/' . $fileName1;
        $file2->save($path2 . '/' . $fileName2);

        // $registration_fee = SchoolRegistration::where('year_id', '=', $request->year)->where('school_id', '=', $request->id)->first();

        foreach ($request->year as $key => $year) {

            $school_registration_fee = new SchoolRegistrationFee();
            $school_registration_fee->school_registration_id  = $school_registration->id;
            $school_registration_fee->year_id  = $year;
            $school_registration_fee->school_id = $request->id;
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

        // $signature = GeneralSecretarySignature::first();

        // $current_year_name = FinancialYear::where('status', 1)->first();

        // $amountInWords_total = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total));
        // $amountInWords_total_to_be_paid = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total_to_be_paid));
        // $amountInWords_school_registration_annual_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->school_registration_annual_fee));
        // $amountInWords_school_student_memebership_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->school_student_memebership_fee));


        // $date = Carbon::createFromFormat('Y-m-d', $request->input('transaction_date'))->format('d-m-Y');

        // // dd($school_registration_fee);
        // $html = '';
        // $view = view('admin.invoice.school_invoice', [
        //     'receipt' => str_pad($school_registration_fee->id, 4, 0, STR_PAD_LEFT),
        //     // 'receipt' => $request->id,
        //     'name' => $request->school_name,
        //     'address' => $request->address, 'total_to_be_paid' => $amountInWords_total_to_be_paid,
        //     'school_registration_annual_fee' => $amountInWords_school_registration_annual_fee,
        //     'school_student_memebership_fee' => $amountInWords_school_student_memebership_fee,
        //     'signature' => $signature->signature, 'transaction_date' => $date,
        //     'total' => $amountInWords_total,
        //     'total_paid' => $request->total,
        //     'school_registration_annual_fee_amount' => $request->school_registration_annual_fee,
        //     'school_student_memebership_fee_amount' => $request->school_student_memebership_fee,
        //     'no_of_students_paid' => $request->no_of_students_paid            
        // ]);
        // $html .= $view->render();
        // $file = Pdf::loadHTML($html);

        // $html1 = '';
        // $view1 = view('admin.thank-you-page.school-registration-thank-you', [
        //     'receipt' => str_pad($school_registration_fee->id, 4, 0, STR_PAD_LEFT),
        //     'name' => $request->school_name, 
        //     'address' => $request->address, 
        //     'district' => $request->district, 
        //     'pin_code' => $request->pin_code, 
        //     'taluk' => $request->taluk, 
        //     'school_registration_annual_fee' => $request->school_registration_annual_fee, 
        //     'amountInWords_school_registration_annual_fee' => $amountInWords_school_registration_annual_fee, 
        //     'current_year_name' => $current_year_name->name, 
        //     'transaction_date' => $date,
        //     'signature' => $signature->signature,
        //     'signature_name' => $signature->name,
        //     'total' => $amountInWords_total,
        //     'total_paid' => $request->total,]);
        // $html1 .= $view1->render();
        // $file1 = Pdf::loadHTML($html1);

        // $path = public_path('/pdf');
        // $fileName =  $request->amount . '.' . 'pdf';
        // $file->save($path . '/' . $fileName);

        $subject = 'Red cross payment';
        $body = "Dear Sir / Madam, <br><br> Your payment towards Junior Red Cross was successful.<br>
        Please find the receipt and thank you letter attached with this mail.<br><br><br>
        Thank you.";




        $emails = [$request->email, $request->councellor_email];
        // dd($emails);
        Mail::to($emails)->send(new InvoiceMail($subject, $body, $file, $file1));

        $admin_mails = AdminUser::select('admin_emails')->where('admin_type', 1)->first();

        if (!is_null($admin_mails)) {
            $admin = explode(',', $admin_mails->admin_emails);
            Mail::to($admin)->send(new InvoiceMail($subject, $body, $file, $file1));
        }

        return redirect()->route('admin.school-registration-payment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id, $year)
    public function show($id, $year)
    {
        // dd( $id, $year);
        $school_registration = DB::table('school_data')
            ->join('school_registrations', 'school_registrations.school_id', '=', 'school_data.id')
            ->join('balances', 'balances.school_id', '=', 'school_data.id')
            ->join('financial_years', 'financial_years.id', '=', 'school_registrations.year_id')
            ->where('school_registrations.school_id', $id)
            ->where('school_registrations.year_id', $year)
            ->first();

        $balances = Balance::with('financial_year')->where('school_id', $id)->where('year_id', $year)->orderBy('year_id', 'DESC')->get();

        $datas = SchoolRegistrationFee::with('financial_year')->where('school_id', $id)->where('year_id', $year)->orderBy('year_id', 'DESC')->get();

        // dd($school_registration, $datas);
        return view('admin.school-registration-payment.show', compact('school_registration', 'datas', 'balances'));
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
    public function destroy($id, $year)
    {

        $school_registration = DB::table('balances')
            ->join('school_data', 'school_data.id', '=', 'balances.school_id')
            ->join('financial_years', 'financial_years.id', '=', 'balances.year_id')
            ->where('financial_years.id', $year)
            ->where('school_data.id', $id)->get();

        // dd($school_registration);
        $school_registration->delete();

        return redirect()->route('admin.school-registration-payment.index');
    }


    public function export()
    {
        return Excel::download(new SchoolRegistrationExport, 'school-data.xlsx');
    }
}
