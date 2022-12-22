<!DOCTYPE html>
<html lang="en" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Flow reactors are designed to enable manufacturers to perform chemical reactions in flow, under a diverse range of operating conditions with excellent process control.">
    <link rel="shortcut icon" href="./assets/image/favicon.png">
    <title>Redcross | Registration Form</title>

    <!-- css link -->
    <link rel="stylesheet" href="./style.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css"
        referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" referrerpolicy="no-referrer"></script>



    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap');

        * {
            padding: 0;
            margin: 0;
            text-decoration: none;

        }

        html {
            scroll-behavior: smooth;
        }


        .navbar-brand img {
            height: 55px;
        }

        .nav-item {
            padding: 0px 7px;
        }

        .nav-item a {
            color: #4b4b4d !important;
            font-weight: 400;
            text-decoration: none;
            list-style: none;
        }

        .navbar {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .navbar-light .navbar-nav .nav-link.active {
            font-weight: 400;
        }

        .nav-item a:hover {
            color: #FF1414 !important;
            transition: color 0.3s ease;
        }

        .nav-item a.btn-outline-success:hover {
            color: #1d1d1d !important;
            transition: color 0.3s ease;
        }

        .navbar-light .navbar-brand {
            max-width: 185px;
        }

        .btns {
            margin: 0 10px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            background: transparent;
            outline: 1px solid #FF1414;
            font-family: "Montserrat", sans-serif;
            overflow: hidden;
            /* box-shadow: 0px 6px 8px 0px rgba(0, 0, 0, 0.079); */
            text-decoration: none;
        }

        .btns:hover {
            box-shadow: 0px 6px 24px 0px rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        .btns:after {
            content: " ";
            width: 0%;
            height: 100%;
            background: #FF1414;
            position: absolute;
            transition: all 0.4s ease-in-out;
            right: 0;
        }

        .btns:hover::after {
            right: auto;
            left: 0;
            width: 100%;
        }

        .btns span {
            text-align: center;
            text-decoration: none;
            width: 100%;
            padding: 14px 16px;
            color: #FF1414;
            font-weight: 400;
            letter-spacing: 1px;
            line-height: 100%;
            z-index: 20;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
        }

        .btns:hover span {
            color: #ffffff;
            animation: scaleUp 0.3s ease-in-out;

        }

        @keyframes scaleUp {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(0.95);
            }

            100% {
                transform: scale(1);
            }
        }


        /* registration form  */


        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .ptb {
            padding: 50px 0;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            height: 40px;
            border-radius: 5px !important;
            border: 1px solid #bdbcbc;
            outline: none;
            padding-left: 15px;
        }

        .input-group select {
            width: 100%;
            height: 40px;
            border-radius: 5px !important;
            border: 1px solid #bdbcbc;
            outline: none;
            padding-left: 15px;
        }

        .input-group textarea {
            width: 100%;
            height: 40px;
            border-radius: 5px !important;
            border: 1px solid #bdbcbc;
            outline: none;
            padding-left: 15px;
        }

        .input-group label {
            padding-bottom: 6px;
            font-size: 15px;
            color: #949292;
        }

        @media (max-width: 768px) {
            .btns span {
                width: 60%;
            }

            .btns:after {
                content: " ";
                width: 0%;
                height: 100%;
                background: #FF1414;
                position: absolute;
                transition: all 0.4s ease-in-out;
                right: 0;
            }

            .btns:hover::after {
                right: auto;
                left: 0;
                width: 60%;
            }

        }

        input.largerCheckbox {
            width: 25px;
            height: 25px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top bg-light px-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('admin/img/cropped-Final-Logo.png') }}" class="img-fluid" alt="logo"
                    srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto b-lg-0">

                    <li class="nav-item">
                        <img src="{{ asset('admin/img/new-icon-gif-2.jpg') }}" height="30px" alt=""
                            style="position: absolute; top:0;right:13px ">
                        <select class="btns" style="color: #000; position: relative;"
                            onChange="window.location.href=this.value">
                            <option value="">Select Registration</option>
                            <option value="{{ route('index') }}">School
                                Registration</option>
                            <option value="#">PU Registration</option>
                            <option value="{{ route('jrc-exam-form') }}">JRC
                                Examination/Program</option>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mb-3 mx-auto">
                    <h1 class="header-underline text-uppercase">School Registration <span class="fs-6 text-capitalize">(
                            Academic 2022 - 2023 )</span> </h1>
                </div>
            </div>

            {{-- {{dd( $data->balance )}} --}}

            <div class="row">
                <div class="col-lg-12rounded">
                    <div class="col-lg-11 mx-auto">
                        <form action="{{ route('school-registration-payment.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Dise code/School code</label>
                                        <input required="" type="text" name="dise_code" id="dise_code"
                                            autocomplete="off" class="input">

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
                                                <label class="user-label">School Name</label>
                                                <input required="" type="text" name="school_name" id="school_name"
                                                    autocomplete="off" class="input" readonly>

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <label class="user-label">District</label>
                                                <input required="" type="text" name="district" id="district"
                                                    autocomplete="off" class="input" readonly>

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <label class="user-label">Taluk</label>
                                                <input required="" type="text" name="taluk" id="taluk"
                                                    autocomplete="off" class="input" readonly>

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <label class="user-label">Pincode</label>
                                                <input required="" type="number" name="pin_code" id="pin_code"
                                                    autocomplete="off" class="input" readonly>

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label class="user-label">Phone Number</label>
                                                <input required="" type="number" name="phone_number"
                                                    id="phone_number" autocomplete="off" class="input" readonly>

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label class="user-label">Email</label>
                                                <input required="" type="email" name="email" id="email"
                                                    autocomplete="off" id="email" class="input" readonly>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <label class="user-label">Address</label>
                                                <input required="" type="text" name="address" id="address"
                                                    autocomplete="off" class="input" readonly>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-1">
                                    <label class="fs-5">Jrc councellor details </label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Name</label>
                                        <input type="text" name="councellor_name" id="councellor_name"
                                            autocomplete="off" class="input" readonly>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Email</label>
                                        <input type="email" name="councellor_email" id="councellor_email"
                                            autocomplete="off" class="input" readonly>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Phone number</label>
                                        <input type="number" name="councellor_phone" id="councellor_phone"
                                            autocomplete="off" class="input" readonly>

                                    </div>
                                </div>

                                <div class="col-lg-12 mt-1">
                                    <label class="fs-5"> Number of students </label>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <label class="user-label">8th</label>
                                        <input type="number" name="no_of_students_class_eight"
                                            id="no_of_students_class_eight" onkeyup="total_no_students();"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <label class="user-label">9th</label>
                                        <input type="number" name="no_of_students_class_nine"
                                            id="no_of_students_class_nine" onkeyup="total_no_students();"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <label class="user-label">10th</label>
                                        <input type="number" name="no_of_students_class_ten"
                                            id="no_of_students_class_ten" onkeyup="total_no_students();"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <label class="user-label">Total students</label>
                                        <input type="number" name="total_students" id="total_students"
                                            autocomplete="off" class="input" readonly>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">School registration annual fee(₹)</label>
                                        <input type="number" name="school_registration_annual_fee"
                                            id="school_registration_annual_fee" autocomplete="off" class="input"
                                            readonly>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Student membership fee per student(₹)</label>
                                        <input type="number" name="school_student_memebership_fee"
                                            id="school_student_memebership_fee" autocomplete="off" class="input"
                                            readonly>

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
                                                    autocomplete="off" class="input" readonly>
                                                   <h6><span id="current_total_students"></span> students * ₹<span id="current_membership_fees"></span>(student membership fees) + ₹<span id="current_registration_fees"></span>(school registration fees)</h6> 
                                            </div>
                                        </div>

                                        <div class="col-lg-2" id="total_amount_paid" style="display: none">
                                            <div class="input-group">
                                                <label class="user-label">Total fees paid(₹)</label>
                                                <input type="number" name="total_amount_paid[]"
                                                    id="total_amount_paid_now" autocomplete="off" class="input"
                                                    readonly>
                                                <span id="current_payment"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="input-group">
                                                <label class="user-label">Total fees to be paid(₹)</label>
                                                <input type="number" name="total_fees[]" id="total_fees"
                                                    autocomplete="off" class="input" readonly>
                                                <span id="formula">Total students* student memebership fee + school registration fee<span>

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

                                </div>


                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <label class="user-label">Total(₹)</label>
                                        <input required="" type="number" name="total" id="total"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>

                                <input required="" type="number" name="convenience" id="convenience"
                                    autocomplete="off" class="input" hidden>

                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <label class="user-label">Convenience fee(₹)</label>
                                        <input required="" type="number" name="convenience_amount"
                                            id="convenience_amount" autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <label class="user-label">Total to be paid(₹)</label>
                                        <input required="" type="number" name="total_to_be_paid"
                                            id="total_to_be_paid" autocomplete="off" class="input">

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
                                <input  type="text" name="mode_of_payment" id="mode_of_payment"
                                     class="input" value="Online Payment" hidden>
                                <input  type="text" name="transaction_date" id="transaction_date"
                                     class="input" value={{date('Y-m-d')}} hidden>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>


    <script>
        //fill the form when dise number filled
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
                        // console.log(answer.dise_code);
                        if(answer.dise_code != dise){
                            alert('enter valid dise code');
                        }
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

        $(document).ready(function() {
            $('#dise_code').on('change', function() {
                var url = "{{ url('master-price-data') }}";
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function(answer) {
                        // console.log('2', answer);
                        $('#school_registration_annual_fee').val(answer[
                            'school_registration_annual_fee']);
                        $('#school_student_memebership_fee').val(answer[
                            'school_student_memebership_fee']);
                        $('#convenience').val(answer[
                            'convenience']);
                    },
                });
            });
        });

        //calculate total number of students 
        window.total_no_students = function total_no_students() {
            var class8 = document.getElementById('no_of_students_class_eight').value || 0;
            var class9 = document.getElementById('no_of_students_class_nine').value || 0;
            var class10 = document.getElementById('no_of_students_class_ten').value || 0;
            var total_no_students = parseInt(class8) + parseInt(class9) + parseInt(class10);
            document.getElementById('total_students').value = total_no_students;

            var school_student_memebership_fee = document.getElementById(
                'school_student_memebership_fee').value || 0;
            var school_registration_annual_fee = document.getElementById(
                'school_registration_annual_fee').value || 0;

            var total_fees = parseInt(total_no_students) * parseInt(school_student_memebership_fee) + parseInt(
                school_registration_annual_fee);
            document.getElementById('total_fees').value = total_fees;

        };

        //calculate amount beign paid
        $(document).ready(function() {
            $('#no_of_students_paid').on('change', function() {
                var no_of_students_paid = document.getElementById('no_of_students_paid').value || 0;
                var school_student_memebership_fee = document.getElementById(
                    'school_student_memebership_fee').value || 0;
                var school_registration_annual_fee = document.getElementById(
                    'school_registration_annual_fee').value || 0;

                var paid_amount = parseInt(no_of_students_paid) * parseInt(school_student_memebership_fee) +
                    parseInt(school_registration_annual_fee);
                document.getElementById('paid_amount').value = paid_amount;

                var total_fees = document.getElementById('total_fees').value;

                var balance_amount = total_fees - paid_amount;
                document.getElementById('balance_amount').value = balance_amount;

            });
        });


        $(document).ready(function() {
            $('#dise_code').on('change', function() {
                let dise = $('#dise_code').val();
                var url = "{{ url('previous-years-data') }}";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        dise
                    },
                    dataType: "json",
                    success: function(answer) {

                        var school_data_previous_payment = answer.school_data_previous_payment;
                        // console.log('school_data_previous_payment',school_data_previous_payment);
                        var htm0 = '';
                        for (k = 0; k < school_data_previous_payment.length; k++) {
                            var current_previous_paid_amount  = school_data_previous_payment[k].paid_amount;
                            // console.log(current_previous_paid_amount);
                            var paid_on  = school_data_previous_payment[k].created_at;
                            htm0 += `<h6 style="font-size:12px">Payment ${k+1} - ₹ ${current_previous_paid_amount} paid on ${paid_on}</h6>`
                        }
                        $('#current_payment').html("");
                        $('#current_payment').append(htm0);

                        var financial_years = answer.financial_years;
                        var balance = answer.balance;
                        var school_data = answer.school_data;
                        var students_data = answer.students_data;
                        var payment_data = answer.payment_data;
                        // console.log('school_data', school_data);


                        $('#total_fees_bal').val(balance?.total_amount)
                        $('#total_amount_paid_now').val(balance?.amount_to_be_paid)
                       

                        $('#total_fees').val(balance?.balance)
                        $('#no_of_students_class_eight').val(school_data
                            ?.no_of_students_class_eight)
                        $('#no_of_students_class_nine').val(school_data
                            ?.no_of_students_class_nine)
                        $('#no_of_students_class_ten').val(school_data
                            ?.no_of_students_class_ten)
                        $('#total_students').val(school_data?.total_students)
                        $('#no_of_students_paid').val(school_data?.no_of_students_paid)
                        $('#current_total_students').text(school_data?.total_students)
                        $('#current_membership_fees').text(school_data?.school_student_memebership_fee)
                        $('#current_registration_fees').text(school_data?.school_registration_annual_fee)


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

                                var no_of_students_class_eight = students_data[i].registrations[
                                    0]?.no_of_students_class_eight;
                                var no_of_students_class_nine = students_data[i].registrations[
                                    0]?.no_of_students_class_nine;
                                var no_of_students_class_ten = students_data[i].registrations[0]
                                    ?.no_of_students_class_ten;
                                var total_students = students_data[i].registrations[0]
                                    ?.total_students;
                                var school_registration_annual_fee = students_data[i]
                                    .registrations[0]?.school_registration_annual_fee;
                                var school_student_memebership_fee = students_data[i]
                                    .registrations[0]?.school_student_memebership_fee;


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
                                                        <h6>${total_students} students* ₹ ${school_student_memebership_fee} (student memebership fee) + ₹ ${school_registration_annual_fee} (school registration fee)</h6>
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-2">
                                                <div class="input-group">
                                                    <label class="user-label">Total fees paid (₹)</label>
                                                    <input type="number" name="total_fees_bal[]"
                                                        id="total_fees_bal-` + i + `" autocomplete="off" class="input"
                                                        value=${total_amount_paid}>
                                                        
                                                    `;
                                                   
                                                    for(j = 0; j < financial_years[i].registration_fees.length; j++){
                                                        var previous_paid_amount = financial_years[i].registration_fees[j].paid_amount;
                                                        var paid_on = financial_years[i].registration_fees[j].created_at;
                                                        htm += `<h6 style="font-size:12px">Payment ${j+1} - ₹ ${previous_paid_amount} paid on ${paid_on}</h6>`;
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
                                    </div> ` ;
                            }
                        }
                        $('#previous').html("");
                        $('#previous').append(htm);

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
            var convenience_amount = Math.ceil((convenience / 100) * total1)

            $('#convenience_amount').val(convenience_amount);

            var total_to_be_paid = parseInt(total1 + convenience_amount);
            // console.log('convenience_amount', convenience_amount);
            // console.log('total1', total1);

            $('#total_to_be_paid').val(total_to_be_paid);

        }
    </script>
</body>

</html>
