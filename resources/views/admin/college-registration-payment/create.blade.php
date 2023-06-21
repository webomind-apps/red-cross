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
                <form action="{{ route('admin.college-registration-payment.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Dise No</label>
                            <input type="text" class="form-control" id="dise_code" name="dise_code" placeholder="Dise No"
                                required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputAddress">College type</label>
                            <select name="college_type" id="college_type" aria-label="Default select example"
                                class="custom-select custom-select-sm form-control form-control-sm" required>
                                <option selected>--Select College type--</option>
                                <option value="0">Government</option>
                                <option value="1">Private</option>
                                <option value="2">Aided</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input type="text" name="id" id="id" class="input" hidden>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">college Name</label>
                            <input type="text" class="form-control" id="college_name" name="college_name"
                                placeholder="college Name">
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
                            <input type="text" class="form-control" id="phone" name="phone_number"
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
                    <label for="inputAddress2">JRC counselor details</label>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Name</label>
                            <input type="text" class="form-control" id="councellor_name" name="councellor_name"
                                placeholder="Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Phone No</label>
                            <input type="number" class="form-control" id="councellor_phone" name="councellor_phone"
                                placeholder="Phone No" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Email</label>
                            <input type="text" class="form-control" id="councellor_email" name="councellor_email"
                                placeholder="Email" required>
                        </div>
                    </div>
                    <label for="inputAddress2">Student payment details</label>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">First PUC</label>
                            <input type="number" class="form-control" id="no_of_students_first_puc"
                                name="no_of_students_first_puc" onkeyup="total_no_students();"
                                placeholder="No. of students" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Second PUC</label>
                            <input type="number" class="form-control" id="no_of_students_second_puc"
                                name="no_of_students_second_puc" onkeyup="total_no_students();"
                                placeholder="No. of students" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputAddress2">Total Student</label>
                            <input type="number" class="form-control" id="total_students" name="total_students"
                                placeholder="Total no. of students" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPassword4">college registration annual fee</label>
                            <input type="number" class="form-control" id="college_registration_annual_fee"
                                name="college_registration_annual_fee" placeholder="college registration annual fee">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Student membership fee</label>
                            <input type="number" class="form-control" id="college_student_memebership_fee"
                                name="college_student_memebership_fee" placeholder="Student membership fee">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Number of students paid</label>
                            <input type="number" class="form-control" id="no_of_students_paid"
                                name="no_of_students_paid" placeholder="Number of students paid" required>
                        </div>
                    </div>

                    <div class="form-row">
                        {{-- <label class="pt-1 text-danger fw-bold">2020 - 2021</label> --}}

                        <div class="col-lg-1 text-center my-auto check-mark">
                            <label class="inputAddress2"> {{ $year ? $year->name : '' }}
                            </label>
                            <input type="checkbox" name="year[]" id="current_year" class="largerCheckbox"
                                value={{ $year ? $year->id : '' }} checked>
                        </div>

                        <div class="form-group col-md-2" id="paid" style="display: none">
                            <div class="input-group">
                                {{-- <label class="user-label">Total fees(₹)</label> --}}
                                <input type="number" name="total_fees_bal[]" id="total_fees_bal" class="form-control"
                                    placeholder="Total fees">
                                <h6>Total students* student memebership fee + college registration fee
                                </h6>

                            </div>
                        </div>
                        <div class="form-group col-md-2" id="total_amount_paid" style="display: none">
                            <div class="input-group">
                                {{-- <label class="user-label">Total fees paid(₹)</label> --}}
                                <input type="number" name="total_amount_paid[]" id="total_amount_paid_now"
                                    class="form-control" placeholder="Total fees paid">

                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <div class="input-group">
                                <input required="" type="number" name="total_fees[]" id="total_fees"
                                    autocomplete="off" class="form-control" placeholder="Total fees to be paid">
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <div class="input-group">
                                <input required="" type="number" name="paid_amount[]" id="paid_amount"
                                    autocomplete="off" class="form-control paid_amount" placeholder="Amount paying now">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="input-group">
                                <input required="" type="number" name="balance_amount[]" id="balance_amount"
                                    autocomplete="off" class="form-control" placeholder="Balance to be paid">
                            </div>
                        </div>

                        <input type="number" name="current_year" id="current_year" hidden
                            value="{{ $year ? $year->id : '' }}" autocomplete="off" class="input">
                    </div>
                    <div id="previous"></div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Total</label>
                            <input type="text" class="form-control" id="total" name="total"
                                placeholder="Total">
                        </div>
                        <input type="text" class="form-control" id="convenience" name="convenience"
                            placeholder="Convenience" hidden>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Convenience</label>
                            <input type="text" class="form-control" id="convenience_amount" name="convenience_amount"
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
                                dateformat="d-m-Y" placeholder="Transaction Date">
                        </div>

                        <input type="hidden" name="razor_payment_id" value="dd/cheque/neft">
                        <input type="hidden" name="order_id" value="dd/cheque/neft">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">
                        <span class="text">Add</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" referrerpolicy="no-referrer"></script>


    <script>
        //fill the form when dise number is filled
        $(document).ready(function() {
            $('#dise_code').on('change', function() {
                // alert('hi');
                let dise = $('#dise_code').val();
                var url = "{{ url('college-data') }}";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        dise
                    },
                    dataType: "json",
                    success: function(answer) {
                        console.log(answer.dise_code);
                        if (answer.dise_code != dise) {
                            alert('enter valid dise code');
                        }
                        $('#id').val(answer['id']);
                        $('#college_name').val(answer['college_name']);
                        $('#district').val(answer['district']);
                        $('#taluk').val(answer['taluk']);
                        $('#pin_code').val(answer['pin_code']);
                        $('#phone').val(answer['phone_number']);
                        $('#email').val(answer['email']);
                        $('#address').val(answer['address']);
                        $('#councellor_name').val(answer['councellor_name']);
                        $('#councellor_email').val(answer['councellor_email']);
                        $('#councellor_phone').val(answer['councellor_phone']);
                    },
                });
            });
        });

        $(document).ready(function() {
            $('#dise_code').on('change', function() {
                var url = "{{ url('master-price-data') }}";
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function(answer) {
                        // console.log('2', answer);
                        $('#college_registration_annual_fee').val(answer[
                            'college_registration_annual_fee']);
                        $('#college_student_memebership_fee').val(answer[
                            'college_student_membership_fee']);
                        $('#convenience').val(answer[
                            'convenience_college']);
                    },
                });
            });
        });



        //calculate total number of students 
        window.total_no_students = function total_no_students() {

            var first_puc = $('#no_of_students_first_puc').val() || 0;
            var second_puc = $('#no_of_students_second_puc').val() || 0;
            var total_students = parseInt(first_puc) + parseInt(second_puc);
            $('#total_students').val(total_students);

            var college_student_memebership_fee = $('#college_student_memebership_fee').val() || 0;
            var college_registration_annual_fee = $('#college_registration_annual_fee').val() || 0;

            var total_fees = parseInt(total_students) * parseInt(college_student_memebership_fee) + parseInt(
                college_registration_annual_fee);
            $('#total_fees').val(total_fees);

        };

        //calculate amount beign paid
        $(document).ready(function() {
            $('#no_of_students_paid').on('change', function() {

                var no_of_students_paid = document.getElementById('no_of_students_paid').value || 0;
                var college_student_memebership_fee = document.getElementById(
                    'college_student_memebership_fee').value || 0;
                var college_registration_annual_fee = document.getElementById(
                    'college_registration_annual_fee').value || 0;

                var paid_amount = parseInt(no_of_students_paid) * parseInt(
                    college_student_memebership_fee) +
                    parseInt(college_registration_annual_fee);
                document.getElementById('paid_amount').value = paid_amount;

                var total_fees = document.getElementById('total_fees').value;

                var balance_amount = total_fees - paid_amount;
                document.getElementById('balance_amount').value = balance_amount;

            });
        });


        $(document).ready(function() {
            $('#dise_code').on('change', function() {
                let dise = $('#dise_code').val();
                // alert(dise);
                var url = "{{ url('college-previous-years-data') }}";
                // alert(url);
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        dise
                    },
                    dataType: "json",
                    success: function(answer) {
                        console.log(answer);

                        var college_data_previous_payment = answer
                        .college_data_previous_payment;
                        // console.log('college_data_previous_payment',college_data_previous_payment);
                        var htm0 = '';
                        for (k = 0; k < college_data_previous_payment.length; k++) {
                            var current_previous_paid_amount = college_data_previous_payment[k]
                                .paid_amount;
                            // console.log(current_previous_paid_amount);
                            var paid_on = college_data_previous_payment[k].created_at;
                            htm0 +=
                                `<h6 style="font-size:12px">Payment ${k+1} - ₹ ${current_previous_paid_amount} paid on ${paid_on}</h6>`
                        }
                        $('#current_payment').html("");
                        $('#current_payment').append(htm0);

                        var financial_years = answer.financial_years;
                        var balance = answer.balance;
                        var college_data = answer.college_data;
                        var students_data = answer.students_data;
                        var payment_data = answer.payment_data;
                        var data_fully_paid = answer.data_fully_paid;
                        // console.log('data_fully_paid', data_fully_paid);


                        $('#total_fees_bal').val(balance?.total_amount)
                        $('#total_amount_paid_now').val(balance?.amount_to_be_paid)


                        $('#total_fees').val(balance?.balance)
                        $('#no_of_students_first_puc').val(college_data
                            ?.no_of_students_in_first_puc)
                        $('#no_of_students_second_puc').val(college_data
                            ?.no_of_students_in_second_puc)

                        $('#total_students').val(college_data?.total_students)
                        $('#no_of_students_paid').val(college_data?.no_of_students_paid)
                        $('#current_total_students').text(college_data?.total_students)
                        $('#current_membership_fees').text(college_data
                            ?.college_student_memebership_fee)
                        $('#current_registration_fees').text(college_data
                            ?.college_registration_annual_fee)


                        if (balance) {
                            var paid = document.getElementById('paid');
                            var total_amount_paid = document.getElementById(
                                'total_amount_paid');
                            var formula = document.getElementById(
                                'formula');
                            paid.style.display = "block";
                            total_amount_paid.style.display = "block";
                            formula.style.display = "none";
                        }

                        var htm = '';

                        for (i = 0; i < financial_years.length; i++) {
                            if (financial_years[i].balances.length > 0 && financial_years[i]
                                .status == 0) {


                                var name = financial_years[i].name
                                var year_id = financial_years[i].id;
                                var paid_amount = financial_years[i].balances[0]?.paid_amount;
                                var balance = financial_years[i].balances[0]?.balance;
                                var total_amount = financial_years[i].balances[0]?.total_amount;
                                var total_amount_paid = financial_years[i].balances[0]
                                    ?.amount_to_be_paid;

                                var no_of_students_in_first_puc = students_data[i]
                                    .registrations[
                                        0]?.no_of_students_in_first_puc;
                                var no_of_students_in_second_puc = students_data[i]
                                    .registrations[
                                        0]?.no_of_students_in_second_puc;

                                var total_students = students_data[i].registrations[0]
                                    ?.total_students;
                                var college_registration_annual_fee = students_data[i]
                                    .registrations[0]?.college_registration_annual_fee;
                                var college_student_memebership_fee = students_data[i]
                                    .registrations[0]?.college_student_memebership_fee;


                                htm += `<div class="col-lg-12">
                                        <div class="row" id=row-` + i + `>
                                            <label class="pt-1 text-danger fw-bold">${name}</label>
                                            <label class="pt-1 text-danger fw-bold"> Select to pay </label>
                                            <div class="col-lg-1 text-center my-auto check-mark">
                                                <input type="checkbox" name="year[]" id="year` + i + `"
                                                    class="largerCheckbox" value=${year_id} >   
                                            </div>  

                                            <div class="col-lg-2">
                                                <div class="input-group">
                                                    <label class="user-label">Total fees (₹)</label>
                                                    <input type="number" name="total_fees_bal[]"
                                                        id="total_fees_bal-` + i + `" autocomplete="off" class="input"
                                                        value=${total_amount}>
                                                        <h6>${total_students} students* ₹ ${college_student_memebership_fee} (student memebership fee) + ₹ ${college_registration_annual_fee} (college registration fee)</h6>
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-2">
                                                <div class="input-group">
                                                    <label class="user-label">Total fees paid (₹)</label>
                                                    <input type="number" name="total_fees_bal[]"
                                                        id="total_fees_bal-` + i + `" autocomplete="off" class="input"
                                                        value=${total_amount_paid}>
                                                        
                                                    `;

                                for (j = 0; j < financial_years[i].registration_fees
                                    .length; j++) {
                                    var previous_paid_amount = financial_years[i]
                                        .registration_fees[j].paid_amount;
                                    var paid_on = financial_years[i].registration_fees[j]
                                        .created_at;

                                    htm +=
                                        `<h6 style="font-size:12px">Payment ${j+1} - ₹ ${previous_paid_amount} paid on ${paid_on}</h6>`;
                                }

                                htm += `</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="input-group">
                                                    <label class="user-label">Balance(₹)</label>
                                                    <input type="number" name="total_fees[]"
                                                        id="total_fees-` + i + `" autocomplete="off" class="input"
                                                        value=${balance}>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="input-group">
                                                    <label class="user-label">Amount paying now(₹)</label>
                                                    <input  type="number" name="paid_amount[]"
                                                        id="paid_amount-` + i + `" autocomplete="off" class="paid_amount">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="input-group">
                                                    <label class="user-label">Balance to be paid(₹)</label>
                                                    <input type="number" name="balance_amount[]"
                                                        id="balance_amount-` + i + `" autocomplete="off" class="input" value="">
                                                   
                                                </div>
                                            </div>
                                            <input type="number" name="previous_financial_year[]"
                                                id="previous_financial_year-` + i + `" autocomplete="off" class="input"
                                                    value=${year_id} hidden>
                                        </div>
                                    </div> `;
                            }
                        }
                        $('#previous').html("");
                        $('#previous').append(htm);

                        var previous_fully_paid_htm = '';
                        var paid = "Fully paid";

                        for (m = 0; m < data_fully_paid.length; m++) {
                            if (data_fully_paid[m].balances.length > 0 && data_fully_paid[m]
                                .status == 0) {


                                var name = data_fully_paid[m].name
                                var year_id = data_fully_paid[m].id;
                                var paid_amount = data_fully_paid[m].balances[0]?.paid_amount;
                                var balance = data_fully_paid[m].balances[0]?.balance;
                                var total_amount = data_fully_paid[m].balances[0]?.total_amount;
                                var total_amount_paid = data_fully_paid[m].balances[0]
                                    ?.amount_to_be_paid;

                                var no_of_students_in_first_puc = students_data[m]
                                    .registrations[
                                        0]?.no_of_students_in_first_puc;
                                var no_of_students_in_second_puc = students_data[m]
                                    .registrations[
                                        0]?.no_of_students_in_second_puc;

                                var total_students = students_data[m].registrations[0]
                                    ?.total_students;
                                var college_registration_annual_fee = students_data[m]
                                    .registrations[0]?.college_registration_annual_fee;
                                var college_student_memebership_fee = students_data[m]
                                    .registrations[0]?.college_student_memebership_fee;


                                previous_fully_paid_htm += `<div class="col-lg-12">
                                        <div class="row" id=row-` + m + `>
                                            <label class="pt-1 text-danger fw-bold">${name}</label>
                                            
                                                <label class="pt-1 text-danger fw-bold">${paid}</label>
                                            
                                            <div class="col-lg-2">
                                                <div class="input-group">
                                                    <label class="user-label">Total fees (₹)</label>
                                                    <input type="number" name="total_fees_bal[]"
                                                        id="total_fees_bal-` + i + `" autocomplete="off" class="input"
                                                        value=${total_amount}>
                                                        <h6>${total_students} students* ₹ ${college_student_memebership_fee} (student memebership fee) + ₹ ${college_registration_annual_fee} (college registration fee)</h6>
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-2">
                                                <div class="input-group">
                                                    <label class="user-label">Total fees paid (₹)</label>
                                                    <input type="number" name="total_fees_bal[]"
                                                        id="total_fees_bal-` + m + `" autocomplete="off" class="input"
                                                        value=${total_amount_paid}>   
                                                    `;

                                for (n = 0; n < data_fully_paid[m].registration_fees
                                    .length; n++) {
                                    var previous_paid_amount = data_fully_paid[m]
                                        .registration_fees[n].paid_amount;
                                    var paid_on = data_fully_paid[m].registration_fees[n]
                                        .created_at;
                                    previous_fully_paid_htm +=
                                        `<h6 style="font-size:12px">Payment ${n+1} - ₹ ${previous_paid_amount} paid on ${paid_on}</h6>`;
                                }

                                previous_fully_paid_htm += `</div>
                                                </div>
                                                  
                                            </div>
                                        </div>
                                       
                                    </div> `;
                            }
                        }
                        $('#previous_fully_paid').html("");
                        $('#previous_fully_paid').append(previous_fully_paid_htm);

                    },
                });
            });
        });

        $(document).on('change', '.paid_amount', function() {
            calculateTotal()
        });


        $(document).on('change', '#paid_amount', function() {
            calculateBalance()
        });

        $(document).on('change', '#no_of_students_paid', function() {
            calculateTotal()
        });
    </script>

    <script>
        function calculateBalance() {
            var total_fees = $('#total_fees').val();
            var paid_amount = $('#paid_amount').val();
            var balance = total_fees - paid_amount;
            $('#balance_amount').val(balance);
        }

        function calculateTotal() {
            // alert('changed')
            var total1 = 0;
            var total = 0;

            $('.paid_amount').each(function() {


                var val = $(this).val();

                var id = $(this).attr('id');
                var index = id.split("-")[1];

                if (val != '') {
                    var total_fees = '#total_fees-' + index;
                    var paid_fees = val;
                    var balance_fees = '#balance_amount-' + index;

                    var balance = $(total_fees).val() - paid_fees;
                    $(balance_fees).val(balance)
                    // console.log('value', balance);
                    total1 = total1 + parseInt(val);

                    $('#total').val(total1);
                }
            })

            var convenience = $('#convenience').val();
            // console.log('convenience', convenience);
            var convenience_amount = ((convenience / 100) * total1)

            $('#convenience_amount').val(convenience_amount);

            var total_to_be_paid = parseFloat(total1 + convenience_amount);
            // console.log('convenience_amount', convenience_amount);
            // console.log('total1', total1);

            $('#total_to_be_paid').val(total_to_be_paid);

        }
    </script>
@endsection
