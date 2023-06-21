@extends('frontend.main')

@section('page-contents')
    <section class="ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mb-3 mx-auto">
                    <h1 class="header-underline text-uppercase">College Registration <span class="fs-6 text-capitalize">
                            (Academic year {{ $year ? $year->name : '' }} )</span> </h1>
                </div>
            </div>

            {{-- {{dd( $data->balance )}} --}}

            <div class="row">
                <div class="col-lg-12rounded">
                    <div class="col-lg-11 mx-auto">
                        <form action="{{ route('college-registration-payment.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Dise code/college code</label>
                                        <input required="" type="text" name="dise_code" id="dise_code"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">College type</label>
                                        <select name="college_type" required>
                                            <option value="">--Select College type--</option>
                                            <option value="0">Government</option>
                                            <option value="1">Private</option>
                                            <option value="2">Aided</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <input required="" type="text" name="id" id="id"
                                            autocomplete="off" class="input" hidden>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <label class="user-label">college Name</label>
                                                <input required="" type="text" name="college_name" id="college_name"
                                                    autocomplete="off" class="input">

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <label class="user-label">District</label>
                                                <input required="" type="text" name="district" id="district"
                                                    autocomplete="off" class="input">

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <label class="user-label">Taluk</label>
                                                <input required="" type="text" name="taluk" id="taluk"
                                                    autocomplete="off" class="input">

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <label class="user-label">Pincode</label>
                                                <input required="" type="number" name="pin_code" id="pin_code"
                                                    autocomplete="off" class="input">

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label class="user-label">Phone Number</label>
                                                <input required="" type="tel" name="phone_number" id="phone"
                                                    autocomplete="off" class="input">

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label class="user-label">Email</label>
                                                <input required="" type="email" name="email" id="email"
                                                    autocomplete="off" id="email" class="input">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <label class="user-label">Address</label>
                                                <input required="" type="text" name="address" id="address"
                                                    autocomplete="off" class="input">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-1">
                                    <label class="fs-5">JRC counselor details </label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Name</label>
                                        <input type="text" name="councellor_name" id="councellor_name"
                                            autocomplete="off" class="input" required>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Email</label>
                                        <input type="email" name="councellor_email" id="councellor_email"
                                            autocomplete="off" class="input" required>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Phone number</label>
                                        <input type="number" name="councellor_phone" id="councellor_phone"
                                            autocomplete="off" class="input" required>

                                    </div>
                                </div>

                                <div class="col-lg-12 mt-1">
                                    <label class="fs-5"> Number of students </label>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <label class="user-label">First PUC</label>
                                        <input type="number" name="no_of_students_first_puc"
                                            id="no_of_students_first_puc" onkeyup="total_no_students();"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <label class="user-label">Second PUC</label>
                                        <input type="number" name="no_of_students_second_puc"
                                            id="no_of_students_second_puc" onkeyup="total_no_students();"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <label class="user-label">Total students</label>
                                        <input type="number" name="total_students" id="total_students"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">college registration annual fee(₹)</label>
                                        <input type="number" name="college_registration_annual_fee"
                                            id="college_registration_annual_fee" autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Student membership fee per student(₹)</label>
                                        <input type="number" name="college_student_memebership_fee"
                                            id="college_student_memebership_fee" autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Number of students paid</label>
                                        <input type="number" id="no_of_students_paid" name="no_of_students_paid"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <label class="pt-1 text-danger fw-bold"> {{ $year ? $year->name : '' }}
                                        </label>
                                        <label class="pt-1 text-danger fw-bold"> Select to pay </label>
                                        <div class="col-lg-1 text-center my-auto check-mark">
                                            <input type="checkbox" name="year[]" id="current_year"
                                                class="largerCheckbox" value={{ $year ? $year->id : '' }} checked>
                                        </div>

                                        <div class="col-lg-2" id="paid" style="display: none">
                                            <div class="input-group">
                                                <label class="user-label">Total fees(₹)</label>
                                                <input type="number" name="total_fees_bal[]" id="total_fees_bal"
                                                    autocomplete="off" class="input">
                                                <h6><span id="current_total_students"></span> students * ₹<span
                                                        id="current_membership_fees"></span>(student membership fees) +
                                                    ₹<span id="current_registration_fees"></span>(college registration
                                                    fees)</h6>
                                            </div>
                                        </div>

                                        <div class="col-lg-2" id="total_amount_paid" style="display: none">
                                            <div class="input-group">
                                                <label class="user-label">Total fees paid(₹)</label>
                                                <input type="number" name="total_amount_paid[]"
                                                    id="total_amount_paid_now" autocomplete="off" class="input">
                                                <span id="current_payment"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="input-group">
                                                <label class="user-label">Total fees to be paid(₹)</label>
                                                <input type="number" name="total_fees[]" id="total_fees"
                                                    autocomplete="off" class="input">
                                                <span id="formula">Total students* student memebership fee + college
                                                    registration fee<span>

                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="input-group">
                                                <label class="user-label">Amount paying now(₹)</label>
                                                <input type="number" name="paid_amount[]" id="paid_amount"
                                                    class="paid_amount" autocomplete="off" class="input">

                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="input-group">
                                                <label class="user-label">Balance to be paid(₹)</label>
                                                <input type="number" name="balance_amount[]" id="balance_amount"
                                                    autocomplete="off" class="input">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="number" name="current_year" id="current_year" hidden
                                    value="{{ $year ? $year->id : '' }}" autocomplete="off" class="input">

                                <div id="previous">
                                    {{-- previous years pending bal data  --}}
                                </div>


                                <div id="previous_fully_paid">
                                    {{-- pervious years fully paid data --}}
                                </div>


                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <label class="user-label">Total(₹)</label>
                                        <input required="" type="number" name="total" id="total"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>

                                <input type="number" name="convenience" id="convenience" class="input" step="any"
                                    hidden>

                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <label class="user-label">Convenience fee(₹)</label>
                                        <input required="" type="number" name="convenience_amount"
                                            id="convenience_amount" class="input" step="any">

                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <label class="user-label">Total to be paid(₹)</label>
                                        <input required="" type="number" name="total_to_be_paid"
                                            id="total_to_be_paid" autocomplete="off" class="input" step="any">

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12 mt-4">
                                            <button class="btns" id="rzp-button1" type="submit"
                                                id="submit"><span>Pay
                                                    Now</span></button>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="mode_of_payment" id="mode_of_payment" class="input"
                                    value="Online Payment" hidden>
                                <input type="text" name="transaction_date" id="transaction_date" class="input"
                                    value={{ date('d-m-Y') }} hidden>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@push('scripts')
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
                        console.log('2', answer);
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

            var total_to_be_paid = parseFloat(total1) + parseFloat(convenience_amount);
            // console.log('convenience_amount', convenience_amount);
            // console.log('total1', total1);

            $('#total_to_be_paid').val(total_to_be_paid.toFixed(2));

        }
    </script>
@endpush
