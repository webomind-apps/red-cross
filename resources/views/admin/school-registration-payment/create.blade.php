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
                <form action="{{ route('admin.school-registration-payment.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Dise No</label>
                            <input type="text" class="form-control" id="dise_code" name="dise_code"
                                placeholder="Dise No">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input required="" type="text" name="id" id="id" autocomplete="off"
                                class="input" hidden>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">School Name</label>
                            <input type="text" class="form-control" id="school_name" name="school_name"
                                placeholder="School Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">District</label>
                            <input type="text" class="form-control" id="district" name="district"
                                placeholder="District">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress2">Taluk</label>
                            <input type="text" class="form-control" id="taluk" name="taluk" placeholder="Taluk">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Pin Code</label>
                            <input type="text" class="form-control" id="pin_code" name="pin_code"
                                placeholder="Pin Code">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Phone No</label>
                            <input type="number" class="form-control" id="phone_number" name="phone_number"
                                placeholder="Phone No">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Mail Id</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Mail Id">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                    </div>
                    <label for="inputAddress2">JRC councellor details</label>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Name</label>
                            <input type="text" class="form-control" id="councellor_name" name="councellor_name"
                                placeholder="Name">
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
                    <label for="inputAddress2">Student payment details</label>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">8th Student</label>
                            <input type="number" class="form-control" id="no_of_students_class_eight"
                                name="no_of_students_class_eight" onkeyup="total_no_students();"
                                placeholder="No. of students">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">9th Student</label>
                            <input type="number" class="form-control" id="no_of_students_class_nine"
                                name="no_of_students_class_nine" onkeyup="total_no_students();"
                                placeholder="No. of students">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">10th Student</label>
                            <input type="number" class="form-control" id="no_of_students_class_ten"
                                name="no_of_students_class_ten" onkeyup="total_no_students();"
                                placeholder="No. of students">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress2">Total Student</label>
                            <input type="number" class="form-control" id="total_students" name="total_students"
                                placeholder="Total no. of students">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPassword4">School registration annual fee</label>
                            <input type="text" class="form-control" id="school_registration_annual_fee"
                                name="school_registration_annual_fee" placeholder="School registration annual fee">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Student membership fee</label>
                            <input type="text" class="form-control" id="school_student_memebership_fee"
                                name="school_student_memebership_fee" placeholder="Student membership fee">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Number of students paid</label>
                            <input type="text" class="form-control" id="no_of_students_paid"
                                name="no_of_students_paid" placeholder="Number of students paid">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="pt-1 text-danger fw-bold">2021 - 2022</label>
                        <div class="form-group col-md-3">
                            <div class="input-group">
                                <input required="" type="number" name="total_fees" id="total_fees"
                                    autocomplete="off" class="form-control" placeholder="Total fees to be paid">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group">
                                <input required="" type="number" name="paid_amount" id="paid_amount"
                                    autocomplete="off" class="form-control" placeholder="Amount you will pay now">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group">
                                <input required="" type="number" name="balance_amount" id="balance_amount"
                                    autocomplete="off" class="form-control" placeholder="Balance to be paid">
                            </div>
                        </div>
                        <div class="col-sm-1 text-center check-mark">
                            <input type="checkbox" name="year" id="year" class="form-control" value="1">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="pt-1 text-danger fw-bold">2020 - 2021</label>

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
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputAddress">Total</label>
                            <input type="text" class="form-control" id="total" name="total"
                                placeholder="Total">
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
                            <input type="date" class="form-control" id="transaction_date" name="transaction_date"
                                placeholder="Transaction Date">
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
                    // if (dise != answer['dise_code']) {
                    //     alert('please enter valid dise code')
                    // }
                    $('#id').val(answer['id']);
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
                    console.log(answer);
                    $('#school_registration_annual_fee').val(answer[
                        'school_registration_annual_fee']);
                    $('#school_student_memebership_fee').val(answer[
                        'school_student_memebership_fee']);
                },
            });
        });
    });
</script>
<script>
    window.total_no_students = function total_no_students() {
        var class8 = document.getElementById('no_of_students_class_eight').value || 0;
        var class9 = document.getElementById('no_of_students_class_nine').value || 0;
        var class10 = document.getElementById('no_of_students_class_ten').value || 0;
        var total_no_students = parseInt(class8) + parseInt(class9) + parseInt(class10);
        document.getElementById('total_students').value = total_no_students;
    };
</script>
