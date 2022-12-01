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
                <form action="{{ route('admin.school-data.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Dise code/School code</label>
                            <input type="text" class="form-control" id="dise_code" name="dise_code" placeholder="Dise code/School code">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">School Name</label>
                            <input type="text" class="form-control" id="school_name" name="school_name" placeholder="School Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">District</label>
                            <input type="text" class="form-control" id="district" name="district" placeholder="District">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Taluk</label>
                            <input type="text" class="form-control" id="taluk" name="taluk" placeholder="Taluk">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Pin code</label>
                            <input type="number" class="form-control" id="pin_code" name="pin_code" placeholder="Pin code">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mail Id</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Mail Id">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Phone No</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone No">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                    </div>
                    <label for="inputEmail4">JRC Councellor Details</label>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="councellor_name" name="councellor_name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Phone No</label>
                            <input type="tel" class="form-control" id="councellor_phone" name="councellor_phone" placeholder="Phone No">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Email</label>
                            <input type="text" class="form-control" id="councellor_address" name="councellor_email" placeholder="Email">
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


