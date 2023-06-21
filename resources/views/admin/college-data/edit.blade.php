@extends('admin.layout.master')

@section('page-contents')
    <!-- /.container-fluid -->
    <div class="container-fluid">

        {{-- {{dd($college_data)}} --}}
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Add Your college Data</h6>
                <!-- <a href="add-payment.html" class="btn btn-primary btn-icon-split">
                              <span class="icon text-white-50">
                                  <i class="fas fa-plus"></i>
                              </span>
                              <span class="text">Update</span>
                          </a> -->
            </div>
            <div class="card-body">
                <form action="{{ route('admin.college-data.update', $college_data->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Dise code/college code</label>
                            <input type="text" class="form-control" id="dise_code" name="dise_code" value="{{$college_data->dise_code}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">college Name</label>
                            <input type="text" class="form-control" id="college_name" name="college_name" value="{{$college_data->college_name}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">District</label>
                            <input type="text" class="form-control" id="district" name="district" value="{{$college_data->district}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Taluk</label>
                            <input type="text" class="form-control" id="taluk" name="taluk" value="{{$college_data->taluk}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Pin code</label>
                            <input type="number" class="form-control" id="pin_code" name="pin_code" value="{{$college_data->pin_code}}">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mail Id</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$college_data->email}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Phone No</label>
                            <input type="tel" class="form-control" id="phone" name="phone_number" value="{{$college_data->phone_number}}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$college_data->address}}">
                        </div>
                    </div>
                    <label for="inputEmail4">JRC Councellor Details</label>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="councellor_name" name="councellor_name" value="{{$college_data->councellor_name}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Phone No</label>
                            <input type="tel" class="form-control" id="councellor_phone" name="councellor_phone" value="{{$college_data->councellor_phone}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Email</label>
                            <input type="text" class="form-control" id="councellor_email" name="councellor_email" value="{{$college_data->councellor_email}}">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3">
                        <!-- <span class="icon text-white-50">
                                      <i class="fas fa-plus"></i>
                                  </span> -->
                        <span class="text">Add</span>
                    </button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection


