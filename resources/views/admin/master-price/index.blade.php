@extends('admin.layout.master')
@section('page-contents')
    <!-- /.container-fluid -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Add Master Prices</h6>
                {{-- <a href="add-payment.html" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Update</span>
                                </a>  --}}
            </div>
            <div class="card-body">
                <form method="POST"
                    action=@if ($masterprice) {{ route('admin.master-price.update', $masterprice->id) }}
                @else
                    {{ route('admin.master-price.store') }} @endif>
                    @if ($masterprice)
                        @method('PATCH')
                    @endif
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="School Registartion Annual fee">School Registartion Annual fee</label>
                            <input type="text" class="form-control" id="school_registration_annual_fee" name="school_registration_annual_fee"
                                placeholder="School Registartion Annual fee"
                                value="{{ $masterprice ? $masterprice->school_registration_annual_fee : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="School Student membership fee">School Student membership fee</label>
                            <input type="text" class="form-control" id="school_student_memebership_fee" name="school_student_memebership_fee"
                                placeholder="Student membership fee"
                                value="{{ $masterprice ? $masterprice->school_student_memebership_fee : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="College Registration Annual fee">College Registration Annual fee</label>
                            <input type="text" class="form-control" id="college_registration_annual_fee" name="college_registration_annual_fee"
                                placeholder="College Registration Annual fee"
                                value="{{ $masterprice ? $masterprice->college_registration_annual_fee : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="to date">College Student membership fee</label>
                            <input type="text" class="form-control" id="college_student_membership_fee" name="college_student_membership_fee"
                                placeholder="College membership fee"
                                value="{{ $masterprice ? $masterprice->college_student_membership_fee : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="JRC Examination fee">JRC Examination fee</label>
                            <input type="text" class="form-control" id="jrc_examination_fee" name="jrc_examination_fee"
                                placeholder="JRC Examination fee"
                                value="{{ $masterprice ? $masterprice->jrc_examination_fee : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Book fee">Book fee</label>
                            <input type="text" class="form-control" id="book_fee" name="book_fee"
                                placeholder="Book fee"
                                value="{{ $masterprice ? $masterprice->book_fee : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Convenience">Convenience %</label>
                            <input type="text" class="form-control" id="convenience" name="convenience"
                                placeholder="Convenience"
                                value="{{ $masterprice ? $masterprice->convenience : '' }}">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3">
                        @if ($masterprice)
                            <span class="text">Update</span>
                        @else
                            <span class="text">Add</span>
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
