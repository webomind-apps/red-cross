@extends('admin.layout.master')

@section('page-contents')
    <!-- /.container-fluid -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Add Your School Data</h6>
                <!-- <a href="add-payment.html" class="btn btn-primary btn-icon-split">
                              <span class="icon text-white-50">
                                  <i class="fas fa-plus"></i>
                              </span>
                              <span class="text">Update</span>
                          </a> -->
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Dise code/School code</label>
                            <input type="text" class="form-control" id="dise_code" value="{{ $school_data->dise_code}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">School Name</label>
                            <input type="text" class="form-control" id="school_name" value="{{ $school_data->school_name}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">District</label>
                            <input type="text" class="form-control" id="district" value="{{ $school_data->district}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Taluk</label>
                            <input type="text" class="form-control" id="taluk" value="{{ $school_data->taluk}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Pin code</label>
                            <input type="number" class="form-control" id="pin_code" value="{{ $school_data->pin_code}}" readonly>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mail Id</label>
                            <input type="text" class="form-control" id="email" value="{{ $school_data->email}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Phone No</label>
                            <input type="tel" class="form-control" id="phone" value="{{ $school_data->phone_number}}" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="address" value="{{ $school_data->address}}" readonly>
                        </div>
                    </div>
                    <label for="inputEmail4">JRC Councellor Details</label>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="councellor_name" value="{{ $school_data->councellor_name}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Phone No</label>
                            <input type="tel" class="form-control" id="councellor_phone" value="{{ $school_data->councellor_phone}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Email</label>
                            <input type="text" class="form-control" id="councellor_email" value="{{ $school_data->councellor_email}}" readonly>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection


