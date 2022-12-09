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
                <form action="{{ route('admin.jrc-exam-payment-details.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Dise No</label>
                            <input type="text" class="form-control" id="dise_code" name="dise_code" placeholder="Dise No">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">School Name</label>
                            <input type="text" class="form-control" id="school_name" name="school_name" placeholder="School Name">
                        </div>
                       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">District</label>
                            <input type="text" class="form-control" id="district" name="district" placeholder="District">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Taluk</label>
                            <input type="text" class="form-control" id="taluk" name="taluk"
                                placeholder="Taluk">
                        </div> 
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Pin Code</label>
                            <input type="text" class="form-control" id="pin_code" name="pin_code" placeholder="Pin Code">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Mail Id</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Mail Id">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Phone No</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                placeholder="Phone No">
                        </div>       
                    </div>
                    <label for="inputAddress2">JRC councellor details</label>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Name</label>
                            <input type="text" class="form-control" id="councellor_name" name="councellor_name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Phone No</label>
                            <input type="text" class="form-control" id="councellor_phone" name="councellor_phone"
                                placeholder="Phone No">
                        </div>       
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Email</label>
                            <input type="text" class="form-control" id="councellor_email" name="councellor_email"
                                placeholder="Email">
                        </div>       
                    </div>
                    <label for="inputAddress2">Number of students</label>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Total number of students</label>
                            <input type="text" class="form-control" id="total_no_of_students" name="total_no_of_students" placeholder="Total number of students">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Student jrc examination fee(per student)</label>
                            <input type="text" class="form-control" id="jrc_examination_fee" name="jrc_examination_fee"
                                placeholder="Student jrc examination fee(per student)">
                        </div>       
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Total</label>
                            <input type="text" class="form-control" id="total_fee_amount" name="total_fee_amount"
                                placeholder="Total">
                        </div>       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Total number of students willing to buy book</label>
                            <input type="text" class="form-control" id="no_of_students_buying_book" name="no_of_students_buying_book" placeholder="Total number of students willing to buy book">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Book fee(per student)</label>
                            <input type="text" class="form-control" id="book_fee" name="book_fee"
                                placeholder="Book fee(per student)">
                        </div>       
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Total</label>
                            <input type="text" class="form-control" id="total_book_fee" name="total_book_fee"
                                placeholder="Total">
                        </div>       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Total</label>
                            <input type="text" class="form-control" id="total" name="total" placeholder="Total">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Convenience</label>
                            <input type="text" class="form-control" id="convenience" name="convenience"
                                placeholder="Convenience">
                        </div>       
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Total to be paid</label>
                            <input type="text" class="form-control" id="total_to_be_paid" name="total_to_be_paid"
                                placeholder="Total to be paid">
                        </div>       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Payment Metod</label>
                            <select name="mode_of_payment" id="mode_of_payment" aria-label="Default select example"
                                class="custom-select custom-select-sm form-control form-control-sm" required>
                                <option selected>Mode Of Payment</option>
                                <option value="1">Demand Draft</option>
                                <option value="2">Cheque</option>
                                <option value="3">NEFT</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Cheque/DD/NEFT No.</label>
                            <input type="text" class="form-control" id="payment_method" name="payment_method"
                                placeholder="Cheque/DD/NEFT No.">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Transaction Date</label>
                            <input type="date" class="form-control" id="transaction_date" name="transaction_date" placeholder="Transaction Date">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">
                        <span class="text">Add</span>
                    </button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('scripts')
    
@endpush
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {

            $('#dise_code').on('change', function() {
                let dise = $('#dise_code').val();
                var url = "{{ url('data') }}";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        dise
                    },
                    dataType: "json",
                    success: function(answer) {
                        // console.log(answer);
                        $('#school_name').val(answer['school_name']);
                        $('#district').val(answer['district']);
                        $('#taluk').val(answer['taluk']);
                        $('#pin_code').val(answer['pin_code']);
                        $('#phone_number').val(answer['phone_number']);
                        $('#email').val(answer['email']);
                        $('#address').val(answer['address']);
                        $('#councellor_name').val(answer['councellor_name']);
                        $('#councellor_email').val(answer['councellor_email']);
                        $('#councellor_phone').val(answer['councellor_phone']);
                    },
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dise_code').on('change', function() {
                var url = "{{ url('master-price-data') }}";
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function(answer) {
                        $('#jrc_examination_fee').val(answer['jrc_examination_fee']);
                        $('#book_fee').val(answer['book_fee']);

                        var convenience = answer['convenience'];
                        document.getElementById('convenience').value = convenience;

                        $('#no_of_students_buying_book').on('change', function() {
                            var no_of_students_buying_book = document.getElementById(
                                    'no_of_students_buying_book')
                                .value;
                            var book_fee = document.getElementById('book_fee').value;
                            var total_book_fee = parseInt(no_of_students_buying_book) *
                                parseInt(book_fee);
                            document.getElementById('total_book_fee').value =
                                total_book_fee;

                            total_fee_amount = document.getElementById(
                                'total_fee_amount').value;
                            total = parseInt(total_book_fee) + parseInt(
                                total_fee_amount);
                            document.getElementById('total').value = total;


                            total_to_be_paid = (parseInt(convenience) / 100) * parseInt(
                                total) + parseInt(total);
                            document.getElementById('total_to_be_paid').value =
                                Math.round(total_to_be_paid);
                        });
                    },
                });
            });
        });

        $(document).ready(function() {
            $('#total_no_of_students').on('change', function() {
                var total_no_of_students = document.getElementById('total_no_of_students').value;
                var jrc_examination_fee = document.getElementById('jrc_examination_fee').value;
                var total_fee_amount = parseInt(total_no_of_students) * parseInt(jrc_examination_fee);
                document.getElementById('total_fee_amount').value = total_fee_amount;

            });
        });
    </script>