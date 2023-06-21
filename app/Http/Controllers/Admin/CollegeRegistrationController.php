<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CollegeRegistrationExport;
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
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use NumberFormatter;

class CollegeRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = request()->year;
        $college = request()->college;
        $district = request()->district;

        $years = FinancialYear::all();
        $colleges = CollegeData::all();
        $districts = CollegeData::distinct()->get(['district']);

        $current_year = FinancialYear::where('status', true)->first();


        if (is_null($year) && is_null($college) && is_null($district)) {
            $college_registrations = DB::table('college_balances')
                ->join('college_data', 'college_data.id', '=', 'college_balances.college_id')
                ->join('financial_years', 'financial_years.id', '=', 'college_balances.year_id')
                ->where('college_balances.year_id', $current_year->id)
                ->orderBy('college_balances.created_at', 'desc')
                ->paginate(25);
        } else if ($year) {
            $college_registrations = DB::table('college_balances')
                ->join('college_data', 'college_data.id', '=', 'college_balances.college_id')
                ->join('financial_years', 'financial_years.id', '=', 'college_balances.year_id')
                ->where('college_balances.year_id', $year)
                ->orderBy('college_balances.created_at', 'desc')
                ->paginate(25);
        } else if ($college) {
            $college_registrations = DB::table('college_balances')
                ->join('college_data', 'college_data.id', '=', 'college_balances.college_id')
                ->join('financial_years', 'financial_years.id', '=', 'college_balances.year_id')
                ->where('college_id', $college)
                ->orderBy('college_balances.created_at', 'desc')
                ->paginate(25);
        } else if ($district) {
            $college_registrations = DB::table('college_balances')
                ->join('college_data', 'college_data.id', '=', 'college_balances.college_id')
                ->join('financial_years', 'financial_years.id', '=', 'college_balances.year_id')
                ->where('district', $district)
                ->orderBy('college_balances.created_at', 'desc')
                ->paginate(25);
        }

        return view('admin.college-registration-payment.index', compact('years', 'colleges', 'districts', 'current_year', 'college_registrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = FinancialYear::where('status', '=', 1)->first();
        return view('admin.college-registration-payment.create', compact('year'));
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
            $receipt = CollegeRegistrationFee::where('year_id', $current_year_name->id)->orderBy('receipt_no', 'desc')->first();
            if ($receipt) {
                $receipt_no_1 = $receipt->receipt_no + 1;
                $receipt_no = str_pad($receipt_no_1, 4, 0, STR_PAD_LEFT);
            } else {
                $receipt_no  = str_pad(1, 4, 0, STR_PAD_LEFT);
            }
        }

        // dd($request);

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

        //    dd($college_registration);
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

            $date = Carbon::createFromFormat('Y-m-d', $request->input('transaction_date'))->format('d-m-Y');
            $college_registration->transaction_date = $date;
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
            $date = Carbon::createFromFormat('Y-m-d', $request->input('transaction_date'))->format('d-m-Y');
            $college_registration->transaction_date = $date;
            $college_registration->save();
        }

        $signature = GeneralSecretarySignature::first();
        $receipt = CollegeRegistrationFee::latest()->first();
        $current_year_name = FinancialYear::where('status', 1)->first();

        $amountInWords_total = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total));
        $amountInWords_total_to_be_paid = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total_to_be_paid));
        $amountInWords_college_registration_annual_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->college_registration_annual_fee));
        $amountInWords_college_student_memebership_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->college_student_memebership_fee));


        $date = Carbon::createFromFormat('Y-m-d', $request->input('transaction_date'))->format('d-m-Y');

        // dd($college_registration_fee);
        $html = '';
        $view = view('admin.invoice.college_invoice', [
            'receipt' => $receipt_no,
            'name' => $request->college_name,
            'address' => $request->address, 'total_to_be_paid' => $amountInWords_total,
            'college_registration_annual_fee' => $amountInWords_college_registration_annual_fee,
            'college_student_memebership_fee' => $amountInWords_college_student_memebership_fee,
            'signature' => $signature->signature, 'signature_name' => $signature->name, 'transaction_date' => $date,
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
            'transaction_date' => $date,
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

        // $registration_fee = collegeRegistration::where('year_id', '=', $request->year)->where('college_id', '=', $request->id)->first();

        foreach ($request->year as $key => $year) {

            $college_registration_fee = new CollegeRegistrationFee();
            $college_registration_fee->college_registration_id  = $college_registration->id;
            $college_registration_fee->year_id  = $year;
            $college_registration_fee->college_id = $request->id;
            $college_registration_fee->razor_payment_id = $request->razor_payment_id;
            $college_registration_fee->order_id = $request->order_id;
            $college_registration_fee->receipt_no = $receipt_no;

            // dd($request->year,$request->total_fees);

            if (!is_null($request->total_fees[$key])) {
                // dd($year);

                $college_registration_fee->total_fees = $request->total_fees[$key];
                $college_registration_fee->paid_amount = $request->paid_amount[$key];
                $college_registration_fee->balance_amount = $request->balance_amount[$key];
                $college_registration_fee->invoice_pdf_path = $fileName;
                $college_registration_fee->thankyou_pdf_path = $fileName1;
                $college_registration_fee->form_print_pdf = $fileName2;

                $college_registration_fee->previous_financial_year = $year;
                $college_registration_fee->save();

                $previous_year = CollegeBalance::where('year_id', $year)->where('college_id', $request->id)->first();

                // dd($previous_year);
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
        $body = "Dear Sir / Madam, <br><br> Your payment towards Junior Red Cross was successful.<br>
        Please find the receipt and thank you letter attached with this mail.<br><br><br>
        Thank you.";



        $emails = [$request->email, $request->councellor_email];
        // dd($emails);
        Mail::to($emails)->send(new CollegeInvoiceMail($subject, $body, $file, $file1));

        $admin_mails = AdminUser::select('admin_emails')->where('admin_type', 0)->first();
        if (!is_null($admin_mails)) {
            $admin = explode(',', $admin_mails->admin_emails);
            Mail::to($admin)->send(new CollegeInvoiceMail($subject, $body, $file, $file1));
        }

        return redirect()->route('admin.college-registration-payment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $year)
    {
        $college_registration = DB::table('college_data')
            ->join('college_registrations', 'college_registrations.college_id', '=', 'college_data.id')
            ->join('college_balances', 'college_balances.college_id', '=', 'college_data.id')
            ->join('financial_years', 'financial_years.id', '=', 'college_registrations.year_id')
            ->where('college_registrations.college_id', $id)
            ->where('college_registrations.year_id', $year)
            ->first();

        $balances = CollegeBalance::with('financial_year')->where('college_id', $id)->where('year_id', $year)->orderBy('year_id', 'DESC')->get();

        $datas = CollegeRegistrationFee::with('financial_year')->where('college_id', $id)->where('year_id', $year)->orderBy('year_id', 'DESC')->get();

        // dd($college_registration, $datas);
        return view('admin.college-registration-payment.show', compact('college_registration', 'datas', 'balances'));
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

    public function export()
    {
        return Excel::download(new CollegeRegistrationExport, 'college-regitration-data.xlsx');
    }
}
 