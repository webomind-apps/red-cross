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

                {{-- {{dd($school_registration)}} --}}
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
                    <label for="inputAddress2">JRC councellor details</label>
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
                            value="{{ $school_registration->school_registration_annual_fee }}"
                                readonly>
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
                    {{-- <div class="form-row">
                        <label class="pt-1 text-danger fw-bold">2021 - 2022</label>
                        <div class="form-group col-md-3">
                            <div class="input-group">
                                <input required="" type="number" name="total_fees" id="total_fees"
                                    autocomplete="off" class="form-control" value="{{ $school_registration->total_fees }}" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group">
                                <input required="" type="number" name="paid_amount" id="paid_amount"
                                    autocomplete="off" class="form-control" value="{{ $school_registration->paid_amount }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group">
                                <input required="" type="number" name="balance_amount" id="balance_amount"
                                    autocomplete="off" class="form-control" value="{{ $school_registration->balance_amount }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-1 text-center check-mark">
                            <input type="checkbox" name="year" id="year" class="form-control" value="2022">
                        </div>
                    </div> --}}
                    <div class="form-row">
                        {{-- <label class="pt-1 text-danger fw-bold">2020 - 2021</label>

                        <div class="form-group col-md-3">
                            <div class="input-group">
                                <input required="" type="number" name="" id="" autocomplete="off"
                                    class="form-control" placeholder="Total fees to be paid">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group">
                                <input required="" type="number" name="text" autocomplete="off"
                                    class="form-control" placeholder="Amount you will pay now">
                            </div>
                        </div>
                        <div class="form-group col-md-3">

                            <div class="input-group">
                                <input required="" type="number" name="text" autocomplete="off"
                                    class="form-control" placeholder="Balance to be paid">
                            </div>
                        </div>
                        <div class="col-sm-1 text-center check-mark">
                            <input type="checkbox" name="" id="" class="form-control">
                        </div> --}}

                        <div class="form-group col-md-4">
                            <label for="inputAddress">Total</label>
                            <input type="text" class="form-control" id="total" name="total"
                            value="{{ $school_registration->total }}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Convenience</label>
                            <input type="text" class="form-control" id="convenience" name="convenience"
                            value="{{ $school_registration->convenience }}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Total paid</label>
                            <input type="text" class="form-control" id="total_to_be_paid" name="total_to_be_paid"
                            value="{{ $school_registration->total_to_be_paid }}" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
