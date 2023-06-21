@extends('admin.layout.master')

@section('page-contents')

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Add Your Payment Details</h6>
                <!-- <a href="add-payment.html" class="btn btn-primary btn-icon-split">
                                                                            <span class="icon text-white-50">
                                                                                <i class="fas fa-plus"></i>
                                                                            </span>
                                                                            <span class="text">Update</span>
                                                                        </a> -->
            </div>
            <div class="card-body">
                <form action="{{ route('admin.school-registration-payment.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Dise No</label>
                            <input type="text" class="form-control" value="{{ $school_registration->dise_code }}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">School Name</label>
                            <input type="text" class="form-control" value="{{ $school_registration->school_name }}"
                                readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">District</label>
                            <input type="text" class="form-control"value="{{ $school_registration->district }}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress2">Taluk</label>
                            <input type="text" class="form-control" value="{{ $school_registration->district }}"
                                readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Pin Code</label>
                            <input type="text" class="form-control" value="{{ $school_registration->pin_code }}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Phone No</label>
                            <input type="number" class="form-control" value="{{ $school_registration->phone_number }}"
                                readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Mail Id</label>
                            <input type="text" class="form-control" value="{{ $school_registration->email }}" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" value="{{ $school_registration->address }}" readonly>
                        </div>
                    </div>
                    <label for="inputAddress2">JRC counselor details</label>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Name</label>
                            <input type="text" class="form-control" value="{{ $school_registration->councellor_name }}"
                                readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Phone No</label>
                            <input type="text" class="form-control" value="{{ $school_registration->councellor_phone }}"
                                readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Email</label>
                            <input type="text" class="form-control" value="{{ $school_registration->councellor_email }}"
                                readonly>
                        </div>
                    </div>
                    <label for="inputAddress2">Student payment details</label>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">8th Student</label>
                            <input type="number" class="form-control" id="no_of_students_class_eight"
                                value="{{ $school_registration->no_of_students_class_eight }}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">9th Student</label>
                            <input type="number" class="form-control" id="no_of_students_class_nine"
                                value="{{ $school_registration->no_of_students_class_nine }}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">10th Student</label>
                            <input type="number" class="form-control" id="no_of_students_class_ten"
                                value="{{ $school_registration->no_of_students_class_ten }}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress2">Total Student</label>
                            <input type="number" class="form-control" id="total_students"
                                value="{{ $school_registration->total_students }}" readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPassword4">School registration annual fee</label>
                            <input type="text" class="form-control" id="school_registration_annual_fee"
                                value="{{ $school_registration->school_registration_annual_fee }}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Student membership fee</label>
                            <input type="text" class="form-control" id="school_student_memebership_fee"
                                value="{{ $school_registration->school_student_memebership_fee }}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Number of students paid</label>
                            <input type="text" class="form-control" id="no_of_students_paid"
                                value="{{ $school_registration->no_of_students_paid }}" readonly>
                        </div>                 
                    </div>
                    <label for="inputAddress">Payment Details of the year </label>
                    @foreach ($balances as $index => $balance)
                        <div class="form-row">

                            <label for="inputAddress">{{ $balance->financial_year->name }}</label>

                            <div class="form-group col-md-2">
                                <label for="inputAddress2">Total to be paid</label>
                                <input type="text" class="form-control" id="convenience" name="convenience"
                                    value="{{ $balance->total_amount }}" readonly>
                                <h6 style="font-size: 12px">Total students* student memebership fee + school registration
                                    fee</h6>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress2">Total paid amount</label>
                                <input type="text" class="form-control" id="total_to_be_paid" name="total_to_be_paid"
                                    value="{{ $balance->amount_to_be_paid }}" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress2">balance</label>
                                <input type="text" class="form-control" id="total_to_be_paid" name="total_to_be_paid"
                                    value="{{ $balance->balance }}" readonly>
                            </div>
                        </div>
                    @endforeach

                    <label for="inputAddress">Payment Split Details</label>
                    @foreach ($datas as $index => $data)
                        <div class="form-row">

                            <label for="inputAddress">Payment {{ $index + 1 }} </label>

                            <div class="form-group col-md-2">
                                <label for="inputAddress2">Total to be paid</label>
                                <input type="text" class="form-control" id="convenience" name="convenience"
                                    value="{{ $data->total_fees }}" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress2">Total paid amount</label>
                                <input type="text" class="form-control" id="total_to_be_paid" name="total_to_be_paid"
                                    value="{{ $data->paid_amount }}" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress2">balance</label>
                                <input type="text" class="form-control" id="total_to_be_paid" name="total_to_be_paid"
                                    value="{{ $data->balance_amount }}" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress2">paid on</label>
                                <input type="text" class="form-control" id="total_to_be_paid" name="total_to_be_paid"
                                    value="{{ $data->created_at->format('d-m-Y') }}" readonly>
                            </div>
                            <div class="form-group col-md-1 my-auto" >
                                <a href="{{ asset("pdf/$data->invoice_pdf_path") }}" target="_blank"><button
                                        type="button" class="btn btn-sm bg-paid mt-3" style="font-size: 9px">Download receipt</button>
                                </a>                              
                            </div>
                            <div class="form-group col-md-1 my-auto" >
                                <a href="{{ asset("thank-you-pdf/$data->thankyou_pdf_path") }}" target="_blank"><button
                                        type="button" class="btn btn-sm bg-paid  mt-3" style="font-size: 9px">Download thank you page</button>
                                </a>                               
                            </div>
                            <div class="form-group col-md-1 my-auto" >
                                <a href="{{ asset("school-payment-form-pdf/$data->form_print_pdf") }}" target="_blank"><button
                                        type="button" class="btn btn-sm bg-paid  mt-3" style="font-size: 9px">Download Application form</button>
                                </a>                               
                            </div>
                        </div>
                    @endforeach

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputAddress2">Payment method</label>
                            <input type="text" class="form-control" id="convenience" name="convenience"
                                value="{{ $school_registration->mode_of_payment }}" readonly>
                        </div>
                       
                        <div class="form-group col-md-2">
                            <label for="inputAddress2">Last transaction date</label>
                            <input type="text" class="form-control" id="total_to_be_paid" name="total_to_be_paid"
                                value="{{ $school_registration->transaction_date }}" readonly>
                        </div>
                    </div>
                </form>

                {{-- <a href="{{ route('admin.school-registration-payment.index') }}">
                    <button class="btn btn-sm ">
                        <i class="fa fa-arrow-left"></i>
                    </button>
                </a> --}}

                <a href="{{ route('admin.school-registration-payment.index') }}"><button type="button"
                        class="btn btn-sm bg-paid"><i class="fa fa-arrow-left"></i></button>
                </a>
                

            </div>
        </div>

    </div>
@endsection
