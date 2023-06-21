<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\JrcExamInvoiceMail;
use App\Models\AdminUser;
use App\Models\CollegeData;
use App\Models\FinancialYear;
use App\Models\GeneralSecretarySignature;
use App\Models\JrcExamination;
use App\Models\SchoolData;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use NumberFormatter;

class JrcExamPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_year = FinancialYear::where('status', 1)->first();
        $jrc_examination_payments = JrcExamination::paginate(10);

        return view('admin.jrc-exam-payment-details.index', compact('jrc_examination_payments','current_year'));
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
        
        $signature = GeneralSecretarySignature::first();

        $current_year_name = FinancialYear::where('status', 1)->first();

        $receipt = JrcExamination::latest()->first();

        $amountInWords_total_to_be_paid = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total_to_be_paid));
        $amountInWords_total = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total));
        $amountInWords_jrc_exam_fee_amount = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->jrc_examination_fee));
        $amountInWords_book_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->book_fee));


        $html = '';
        $view = view('admin.invoice.jrc_exam_invoice', [
            'receipt' => str_pad(1, 4, 0, STR_PAD_LEFT),
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
        $fileName =  'jrc-exam' . '.' . 'pdf';
        $file->save($path . '/' . $fileName);

        $html1 = '';
        $view1 = view('admin.thank-you-page.jrc-exam-thank-you-page', [
            'receipt' => str_pad(1, 4, 0, STR_PAD_LEFT),
            'name' => $request->school_name,
            'address' => $request->address,
            'taluk' => $request->taluk,
            'district' => $request->district,
            'pin_code' => $request->pin_code,
        ]);
        $html1 .= $view1->render();
        $file1 = Pdf::loadHTML($html1);

        $path1 = public_path('/jrc-exam-thank-you-pdf');
        $fileName1 =  'jrc-exam' . '.' . 'pdf';
        $file1->save($path1 . '/' . $fileName1);

        $jrc_exam_fees = new JrcExamination();
        if (isset($request->school_id)) {
            $jrc_exam_fees->school_id =  $request->school_id;
        }
        if (isset($request->college_id)) {
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
        $jrc_exam_fees->razor_payment_id = $request->razor_payment_id;
        $jrc_exam_fees->order_id = $request->order_id;
        $jrc_exam_fees->receipt_pdf = $fileName;
        $jrc_exam_fees->thank_you_pdf = $fileName1;
        $jrc_exam_fees->save();


        
        // $signature = GeneralSecretarySignature::first();

        // $current_year_name = FinancialYear::where('status', 1)->first();

        // $receipt = JrcExamination::latest()->first();

        // $amountInWords_total_to_be_paid = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total_to_be_paid));
        // $amountInWords_total = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->total));
        // $amountInWords_jrc_exam_fee_amount = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->jrc_examination_fee));
        // $amountInWords_book_fee = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($request->book_fee));


        // $html = '';
        // $view = view('admin.invoice.jrc_exam_invoice', [
        //     'receipt' => str_pad($receipt->id, 4, 0, STR_PAD_LEFT),
        //     'transaction_date' => $request->transaction_date,
        //     'name' => $request->school_name,
        //     'address' => $request->address,
        //     'total' => $amountInWords_total,
        //     'total_paid' => $request->total,
        //     'jrc_exam_fee' => $request->jrc_examination_fee,
        //     'jrc_exam_fee_amount' => $amountInWords_jrc_exam_fee_amount,
        //     'book_fee' => $request->book_fee,
        //     'book_fee_amount' =>  $amountInWords_book_fee,
        //     'total_no_of_students' =>  $request->total_no_of_students,
        //     'no_of_students_buying_book' =>  $request->no_of_students_buying_book,
        //     'signature' => $signature->signature

        // ]);
        // $html .= $view->render();
        // $file = Pdf::loadHTML($html);

        // $path = public_path('/jrc-exam-pdf');
        // $fileName =  $receipt->id . '.' . 'pdf';
        // $file->save($path . '/' . $fileName);

        // $html1 = '';
        // $view1 = view('admin.thank-you-page.jrc-exam-thank-you-page', [
        //     'receipt' => str_pad($receipt->id, 4, 0, STR_PAD_LEFT),
        //     'name' => $request->school_name,
        //     'address' => $request->address,
        //     'taluk' => $request->taluk,
        //     'district' => $request->district,
        //     'pin_code' => $request->pin_code,
        // ]);
        // $html1 .= $view1->render();
        // $file1 = Pdf::loadHTML($html1);

        // $path1 = public_path('/jrc-exam-thank-you-pdf');
        // $fileName1 =  $receipt->id . '.' . 'pdf';
        // $file1->save($path1 . '/' . $fileName1);

        $subject = 'Red cross payment';
        $body = "Dear Sir / Madam, <br><br> We acknowledge with thanks the receipt of 
        Rs.$request->jrc_examination_fee /- ( $amountInWords_jrc_exam_fee_amount )
        sent through online Dated: $request->transaction_date, towards fee for Junior Red Cross for the year $current_year_name->name.<br>
        Please find the receipt and thank you letter attached with this mail<br><br><br>
        Thank you.";

        $emails = [$request->email, $request->councellor_email];
        Mail::to($emails)->send(new JrcExamInvoiceMail($subject, $body, $file, $file1));


        $admin_mails = AdminUser::select('admin_emails')->where('admin_type', 2)->first();
        // dd($admin_mails);
        if (!is_null($admin_mails)) {
            $admin = explode(',', $admin_mails->admin_emails);
            Mail::to($admin)->send(new JrcExamInvoiceMail($subject, $body, $file, $file1));
        }

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
        
        $jrc_examination_payment = JrcExamination::find($id);
      
        $data = CollegeData::where('id', $jrc_examination_payment->college_id)->first();
       
        return view('admin.jrc-exam-payment-details.show', compact('jrc_examination_payment', 'data'));
    }
    public function school_show($id)
    {
       
        $jrc_examination_payment = JrcExamination::find($id);
       
        $data = SchoolData::where('id', $jrc_examination_payment->school_id)->first();
       
        return view('admin.jrc-exam-payment-details.show', compact('jrc_examination_payment', 'data'));
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
        $jrc_examination_payment = JrcExamination::find($id);

        $jrc_examination_payment->delete();

        return redirect()->route('admin.jrc-exam-payment-details.index');
    }
}

