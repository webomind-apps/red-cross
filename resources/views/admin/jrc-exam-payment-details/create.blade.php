@extends('admin.layout.master')

@section('page-contents')
    <!-- /.container-fluid -->
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
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Dise No</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Dise No">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">School Name</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="School Name">
                        </div>
                       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">District</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="District">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Taluk</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                placeholder="Taluk">
                        </div> 
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Pin Code</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Pin Code">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Mail Id</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Mail Id">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Phone No</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                placeholder="Phone No">
                        </div>       
                    </div>
                    <label for="inputAddress2">JRC councellor details</label>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Name</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Phone No</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                placeholder="Phone No">
                        </div>       
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Email</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                placeholder="Email">
                        </div>       
                    </div>
                    <label for="inputAddress2">Student payment details</label>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">8th Student</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="No. of students">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">9th Student</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="No. of students">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">10th Student</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="No. of students">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress2">Total Student</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="No. of students">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Registration Fee</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Registration Fee">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Total Fees to be Paid</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Total Fees to be Paid">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Student Fees Paid</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Student Fees Paid">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Balance Fees to be Paid</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Balance Fees to be Paid">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Payment Metod</label>
                            <select name="dataTable_length" aria-label="Default select example"
                                class="custom-select custom-select-sm form-control form-control-sm">
                                <option selected>Mode Of Payment</option>
                                <option value="1">Demand Draft</option>
                                <option value="2">Cheque</option>
                                <option value="3">NEFT</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Cheque/DD/NEFT No.</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Cheque/DD/NEFT No.">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Transaction Date</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Transaction Date">
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
