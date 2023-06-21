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


        .circular-btn {
            padding: 5px 20px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            background: transparent;
            border: 1px solid #FF1414;
            font-family: "Montserrat", sans-serif;
            overflow: hidden;
            text-decoration: none;
            transition: all 0.3s ease 0s;
        }

        .circular-btn:hover {
            background-color: red;
            color: #fff !important;
            transition: all 0.3s ease 0s;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top bg-light px-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://redcrosskarnataka.org/">
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
                        <a href="{{ route('application_guide') }}"><button class="circular-btn"
                                style="color: #000; position: relative; padding: 0px 20px">
                                Application Guide
                            </button></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('circulars') }}"><button class="circular-btn"
                                style="color: #000; position: relative; padding: 0px 20px">
                                Circulars
                            </button></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('index') }}"><button class="circular-btn"
                                style="color: #000; position: relative; padding: 0px 20px">
                                School Registration
                            </button></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('college-registration-form') }}"><button class="circular-btn"
                                style="color: #000; position: relative; padding: 0px 20px">
                                PU College Registration
                            </button></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('jrc-exam-form') }}"><button class="circular-btn"
                                style="color: #000; position: relative; padding: 0px 20px">
                                JRC Examination/Program
                            </button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <section class="ptb">
        <div class="container">
            <div class="row">

                <div class="col-lg-11 mb-3 mx-auto">
                    <h1 class="header-underline text-uppercase">JRC Examination/Program <span
                            class="fs-6 text-capitalize">( Academic {{ $year ? $year->name : '' }} )</span> </h1>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12rounded">
                    <div class="col-lg-11 mx-auto">
                        <form action="{{ route('jrc-examination-payment.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Dise code/School code</label>
                                        <input required="" type="text" name="dise_code" id="dise_code"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <input type="text" name="school_id" id="school_id" autocomplete="off"
                                            class="input" hidden>
                                        <input type="text" name="college_id" id="college_id" autocomplete="off"
                                            class="input" hidden>
                                        <input type="text" name="year_id" id="year_id" autocomplete="off"
                                            class="input" hidden value="{{ $year->id }}">

                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <label class="user-label">School Name</label>
                                                <input required="" type="text" name="school_name" id="name"
                                                    autocomplete="off" class="input">

                                            </div>
                                        </div>

                                        <input name="current_year" hidden id="current_year"
                                            value={{ $year ? $year->id : '' }}>

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
                                                <input required="" type="number" name="phone_number"
                                                    id="phone_number" autocomplete="off" class="input">

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <label class="user-label">Email</label>
                                                <input required="" type="email" name="email" id="email"
                                                    autocomplete="off" class="input">

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
                                        <input required="" type="text" name="councellor_name"
                                            id="councellor_name" autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Email</label>
                                        <input required="" type="email" name="councellor_email"
                                            id="councellor_email" autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Phone number</label>
                                        <input required="" type="number" name="councellor_phone"
                                            id="councellor_phone" autocomplete="off" class="input">

                                    </div>
                                </div>

                                <div class="col-lg-12 mt-1">
                                    <label class="fs-5"> Number of students </label>
                                </div>

                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Total number students</label>
                                        <input required="" type="number" name="total_no_of_students"
                                            id="total_no_of_students" autocomplete="off" class="input">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Student jrc examination fee per student(₹)</label>
                                        <input required="" type="number" name="jrc_examination_fee"
                                            id="jrc_examination_fee" autocomplete="off" class="input">

                                    </div>
                                </div>

                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <label class="user-label">Total(₹)</label>
                                        <input required="" type="number" id="total_fee_amount"
                                            name="total_fee_amount" autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Total number students willing to buy book</label>
                                        <input required="" type="number" name="no_of_students_buying_book"
                                            id="no_of_students_buying_book" autocomplete="off" class="input">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <label class="user-label">Book fee per student(₹)</label>
                                        <input required="" type="number" name="book_fee" id="book_fee"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>

                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <label class="user-label">Total(₹)</label>
                                        <input required="" type="number" name="total_book_fee"
                                            id="total_book_fee" autocomplete="off" class="input">

                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <label class="user-label">Total(₹)</label>
                                        <input required="" type="number" name="total" id="total"
                                            autocomplete="off" class="input">

                                    </div>
                                </div>

                                <input required="" type="number" step="any" name="convenience"
                                    id="convenience" autocomplete="off" class="input" hidden>
                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <label class="user-label">Convenience(₹)</label>
                                        <input required="" type="number" name="convenience_amount"
                                            id="convenience_amount" step="any" autocomplete="off"
                                            class="input">

                                    </div>
                                </div>

                                <div class="col-lg-4 ">
                                    <div class="input-group">
                                        <label class="user-label">Total to be paid(₹)</label>
                                        <input required="" type="number" name="total_to_be_paid"
                                            id="total_to_be_paid" autocomplete="off" class="input" step="any">

                                    </div>
                                </div>

                                <input type="number" name="mode_of_payment" id="mode_of_payment" class="input"
                                    value="online payment" hidden>
                                {{-- 
                                <input type="number" name="payment_method" id="payment_method" class="input"
                                    value="online payment" hidden> --}}

                                <input type="text" name="transaction_date" id="transaction_date" class="input"
                                    value={{ date('d-m-Y') }} hidden>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12 mt-4">
                                            <button type="submit" class="btns"><span>Pay Now</span></a>
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
        $(document).ready(function() {

            $('#dise_code').on('change', function() {
                let dise = $('#dise_code').val();
                var url = "{{ url('jrc-data') }}";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        dise
                    },
                    dataType: "json",
                    success: function(answer) {
                        console.log(answer.schoolData);
                        if (answer.schoolData) {
                            $('#school_id').val(answer.schoolData['id']);
                            $('#name').val(answer.schoolData['school_name']);
                            $('#district').val(answer.schoolData['district']);
                            $('#taluk').val(answer.schoolData['taluk']);
                            $('#pin_code').val(answer.schoolData['pin_code']);
                            $('#phone_number').val(answer.schoolData['phone_number']);
                            $('#email').val(answer.schoolData['email']);
                            $('#address').val(answer.schoolData['address']);
                            $('#councellor_name').val(answer.schoolData['councellor_name']);
                            $('#councellor_email').val(answer.schoolData['councellor_email']);
                            $('#councellor_phone').val(answer.schoolData['councellor_phone']);
                        } else if (answer.collegeData) {
                            $('#college_id').val(answer.collegeData['id']);
                            $('#name').val(answer.collegeData['college_name']);
                            $('#district').val(answer.collegeData['district']);
                            $('#taluk').val(answer.collegeData['taluk']);
                            $('#pin_code').val(answer.collegeData['pin_code']);
                            $('#phone_number').val(answer.collegeData['phone_number']);
                            $('#email').val(answer.collegeData['email']);
                            $('#address').val(answer.collegeData['address']);
                            $('#councellor_name').val(answer.collegeData['councellor_name']);
                            $('#councellor_email').val(answer.collegeData['councellor_email']);
                            $('#councellor_phone').val(answer.collegeData['councellor_phone']);
                        }

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

                            var convenience = $('#convenience').val();
                            // console.log('convenience', convenience);
                            var convenience_amount = ((convenience / 100) * total)
                                .toFixed(3);

                            $('#convenience_amount').val(convenience_amount);


                            total_to_be_paid = (parseFloat(convenience) / 100) * parseFloat(
                                total) + parseFloat(total);
                            document.getElementById('total_to_be_paid').value =
                                total_to_be_paid;
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

</body>

</html>
