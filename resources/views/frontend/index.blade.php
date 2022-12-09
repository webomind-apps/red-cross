<!DOCTYPE html>
<html lang="en">

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
            position: relative;
            margin: 15px 0;
        }

        input {
            width: 100%;
            border: solid 1.5px #9e9e9e;
            background: none;
            padding: 10px;
            font-size: 14px;
            transition: border 150ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        select {
            width: 100%;
            border: none;
            outline: none;
            border: solid 1.5px #9e9e9e;
            background: none;
            padding: 10px;
            padding-right: 20px !important;
            font-size: 14px;
            transition: border 150ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        textarea {
            width: 100%;
            border: none;
            outline: none;
            border: solid 1.5px #9e9e9e;
            background: none;
            padding: 10px;
            padding-right: 20px !important;
            font-size: 14px;
            transition: border 150ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        input[type=checkbox] {
            text-align: left;
        }

        .user-label {
            position: absolute;
            left: 15px;
            color: #3a3939;
            pointer-events: none;
            transform: translateY(.7rem);
            transition: 150ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input:focus,
        input:valid {
            outline: none;
            border: 1.5px solid #FF1414;
        }

        .input:focus~label,
        input:valid~label {
            transform: translateY(-55%) scale(0.8);
            background-color: #fff;
            padding: 0 .2em;
            color: #FF1414;
            font-size: 20px;
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
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top bg-light px-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./img/cropped-Final-Logo.png" class="img-fluid" alt="logo" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto b-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#flow-reactor">Flow-Reactor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Benifits">Benifits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#solutions">Solutions</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#Specifications"> Technical Specifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Faq">Faq</a>
                    </li>
                    <li class="nav-item">
                        <!-- <img src="./new-icon-gif-2.jpg" height="30px" class="position:absolute; left:40px"> -->
                        <img src="./new-icon-gif-2.jpg" height="30px" alt=""
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
            <div class="row">
                <div class="col-lg-12rounded">
                    <div class="col-lg-11 mx-auto">
                        <form action="{{ route('school-registration-payment.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <input required="" type="text" name="dise_code" id="dise_code"
                                            autocomplete="off" class="input">
                                        <label class="user-label">Dise code/School code</label>
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
                                                <input required="" type="text" name="school_name"
                                                    id="school_name" autocomplete="off" class="input" >
                                                <label class="user-label">School Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <input required="" type="text" name="district" id="district"
                                                    autocomplete="off" class="input">
                                                <label class="user-label">District</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <input required="" type="text" name="taluk" id="taluk"
                                                    autocomplete="off" class="input">
                                                <label class="user-label">Taluk</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <input required="" type="number" name="pin_code" id="pin_code"
                                                    autocomplete="off" class="input">
                                                <label class="user-label">Pincode</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input required="" type="number" name="phone_number"
                                                    id="phone_number" autocomplete="off" class="input">
                                                <label class="user-label">Phone Number</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input required="" type="email" name="email" id="email"
                                                    autocomplete="off" id="email" class="input">
                                                <label class="user-label">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <input required="" type="text" name="address" id="address"
                                                    autocomplete="off" class="input">
                                                <label class="user-label">Address</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-1">
                                    <label class="fs-5">Jrc councellor details </label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <input required="" type="text" name="councellor_name"
                                            id="councellor_name" autocomplete="off" class="input">
                                        <label class="user-label">Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <input required="" type="email" name="councellor_email"
                                            id="councellor_email" autocomplete="off" class="input">
                                        <label class="user-label">Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <input required="" type="number" name="councellor_phone"
                                            id="councellor_phone" autocomplete="off" class="input">
                                        <label class="user-label">Phone number</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-1">
                                    <label class="fs-5"> Number of students </label>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input required="" type="number" name="no_of_students_class_eight"
                                            id="no_of_students_class_eight" onkeyup="total_no_students();"
                                            autocomplete="off" class="input">
                                        <label class="user-label">8th</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input required="" type="number" name="no_of_students_class_nine"
                                            id="no_of_students_class_nine" onkeyup="total_no_students();"
                                            autocomplete="off" class="input">
                                        <label class="user-label">9th</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input required="" type="number" name="no_of_students_class_ten"
                                            id="no_of_students_class_ten" onkeyup="total_no_students();"
                                            autocomplete="off" class="input">
                                        <label class="user-label">10th</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input required="" type="number" name="total_students"
                                            id="total_students" autocomplete="off" class="input">
                                        <label class="user-label">Total students</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <input required="" type="number" name="school_registration_annual_fee"
                                            id="school_registration_annual_fee" autocomplete="off" class="input">
                                        <label class="user-label">School registration annual fee</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <input required="" type="number" name="school_student_memebership_fee"
                                            id="school_student_memebership_fee" autocomplete="off" class="input">
                                        <label class="user-label">Student membership fee (per student)</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <input required="" type="number" id="no_of_students_paid"
                                            name="no_of_students_paid" autocomplete="off" class="input"
                                            value="">
                                        <label class="user-label">Number of students paid</label>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <label class="pt-1 text-danger fw-bold">{{ $year->name }}</label>
                                        <div class="col-lg-1 text-center my-auto check-mark">
                                            <input type="checkbox" name="year[]" id="current_year"
                                                class="largerCheckbox" value="{{ $year->id }}" required>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <input required="" type="number" name="total_fees[]"
                                                    id="total_fees" autocomplete="off" class="input">
                                                <label class="user-label">Total fees to be paid</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <input required="" type="number" name="paid_amount[]"
                                                    id="paid_amount" autocomplete="off" class="input">
                                                <label class="user-label">Amount you will pay now</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <input required="" type="number" name="balance_amount[]"
                                                    id="balance_amount" autocomplete="off" class="input">
                                                <label class="user-label">Balance to be paid</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="previous"></div>

                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <input required="" type="number" name="total" id="total"
                                            autocomplete="off" class="input">
                                        <label class="user-label">Total</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <input required="" type="number" name="convenience" id="convenience"
                                            autocomplete="off" class="input">
                                        <label class="user-label">Convenience</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <input required="" type="number" name="total_to_be_paid"
                                            id="total_to_be_paid" autocomplete="off" class="input">
                                        <label class="user-label">Total to be paid</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12 mt-4">
                                            <button class="btns" type="submit"><span>Pay Now</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" referrerpolicy="no-referrer"></script>

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
                        // console.log(answer);
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
                        for (i = 0; i < answer.length; i++) {
                            var htm = `<div class="col-lg-12">
                                        <div class="row" id=row-` + i + `>
                                            <label class="pt-1 text-danger fw-bold">${answer[i].year_id}</label>
                                            <div class="col-lg-1 text-center my-auto check-mark">
                                                <input type="checkbox" name="year[]" id="year` + i + `"
                                                    class="largerCheckbox" value=${answer[i].year_id} >
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="input-group">
                                                    <input required="" type="number" name="total_fees[]"
                                                        id="total_fees-` + i + `" autocomplete="off" class="input"
                                                        value=${answer[i].balance}>
                                                    <label class="user-label">Total fees to be paid</label>
                                                </div>
                                            </div>
                                            <input required="" type="number" name="previous_financial_year[]"
                                                id="previous_financial_year-` + i + `" autocomplete="off" class="input"
                                                    value=${answer[i].year_id} hidden>

                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <input required="" type="number" name="paid_amount[]"
                                                        id="paid_amount-` + i + `" autocomplete="off" class="paid_amount">
                                                    <label class="user-label">Amount you will pay now</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <input required="" type="number" name="balance_amount[]"
                                                        id="balance_amount-` + i + `" autocomplete="off" class="input" value="">
                                                    <label class="user-label">Balance to be paid</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                            $('#previous').append(htm);
                        }
                    },
                });
            });
        });

        $(document).on('change', '.paid_amount', function() {
            calculateTotal()

        });
    </script>

    <script>
        function calculateTotal() {
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
                    // console.log(total);
                }

            })

            var current_total = $(paid_amount).val();

            total = total1 + parseInt(current_total);
            $('#total').val(total);


        }
        convenience = $(convenience).val();
        // alert(convenience);
        convenience_amount = parseInt((convenience / 100) * total);
        // alert(convenience_amount);
        total_to_be_paid = total + convenience_amount;
        $('#total_to_be_paid').val(total_to_be_paid);
    </script>
</body>

</html>
