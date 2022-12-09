@extends('admin.layout.master')

@section('page-contents')
    <!-- /.container-fluid -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Jrc Exam Payment Details</h6>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Dise No</label>
                        <input type="text" class="form-control" id="dise_code"
                            value="{{ $jrc_examination_payment->dise_code }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">School Name</label>
                        <input type="text" class="form-control" id="school_name"
                            value="{{ $jrc_examination_payment->school_name }}" readonly>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress">District</label>
                        <input type="text" class="form-control" id="district"
                            value="{{ $jrc_examination_payment->district }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Taluk</label>
                        <input type="text" class="form-control" id="taluk"
                            value="{{ $jrc_examination_payment->taluk }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Pin Code</label>
                        <input type="text" class="form-control" id="pin_code"
                            value="{{ $jrc_examination_payment->pin_code }}" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="address"
                            value="{{ $jrc_examination_payment->address }}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Mail Id</label>
                        <input type="text" class="form-control" id="email"
                            value="{{ $jrc_examination_payment->email }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Phone No</label>
                        <input type="text" class="form-control" id="phone_number"
                            value="{{ $jrc_examination_payment->phone_number }}" readonly>
                    </div>
                </div>
                <label for="inputAddress2">JRC councellor details</label>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Name</label>
                        <input type="text" class="form-control" id="councellor_name"
                            value="{{ $jrc_examination_payment->councellor_name }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Phone No</label>
                        <input type="text" class="form-control" id="councellor_phone"
                            value="{{ $jrc_examination_payment->councellor_phone }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Email</label>
                        <input type="text" class="form-control" id="councellor_email"
                            value="{{ $jrc_examination_payment->councellor_email }}" readonly>
                    </div>
                </div>
                <label for="inputAddress2">Number of students</label>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Total number of students</label>
                        <input type="text" class="form-control" id="total_no_of_students"
                            value="{{ $jrc_examination_payment->total_no_of_students }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Student jrc examination fee(per student)</label>
                        <input type="text" class="form-control" id="jrc_examination_fee"
                            value="{{ $jrc_examination_payment->jrc_examination_fee }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Total</label>
                        <input type="text" class="form-control" id="total_fee_amount"
                            value="{{ $jrc_examination_payment->total_fee_amount }}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Total number of students willing to buy book</label>
                        <input type="text" class="form-control" id="no_of_students_buying_book"
                            value="{{ $jrc_examination_payment->no_of_students_buying_book }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Book fee(per student)</label>
                        <input type="text" class="form-control" id="book_fee"
                            value="{{ $jrc_examination_payment->book_fee }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Total</label>
                        <input type="text" class="form-control" id="total_book_fee"
                            value="{{ $jrc_examination_payment->total_book_fee }}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Total</label>
                        <input type="text" class="form-control" id="total"
                            value="{{ $jrc_examination_payment->total }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Convenience</label>
                        <input type="text" class="form-control" id="convenience"
                            value="{{ $jrc_examination_payment->convenience }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Total to be paid</label>
                        <input type="text" class="form-control" id="total_to_be_paid"
                            value="{{ $jrc_examination_payment->total_to_be_paid }}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Payment Metod</label>
                        @if ($jrc_examination_payment->mode_of_payment == 1)
                            <input type="text" class="form-control" id="payment_method" value="DD" readonly>
                        @elseif($jrc_examination_payment->mode_of_payment == 2)
                            <input type="text" class="form-control" id="payment_method" value="Cheque" readonly>
                        @elseif($jrc_examination_payment->mode_of_payment == 3)
                            <input type="text" class="form-control" id="payment_method" value="NEFT" readonly>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Cheque/DD/NEFT No.</label>
                        <input type="text" class="form-control" id="payment_method"
                            value="{{ $jrc_examination_payment->payment_method }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Transaction Date</label>
                        <input type="text" class="form-control" id="transaction_date"
                            value="{{ $jrc_examination_payment->transaction_date }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
