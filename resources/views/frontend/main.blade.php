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

        .red-cross-table {
            padding: 30px 20px 10px 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg)
        }

        .red-cross-table .table {

            border: none !important;
            outline: none !important;
        }

        .red-cross-table th,
            {
            border: none !important;
            padding: 10px 5px !important;
        }

        .red-cross-table td,
            {
            border: none !important;
            padding: 10px 5px !important;
        }

        .red-cross-table .table,
        th {
            border: 1px solid #e1e1e1;
            padding: 15px 20px !important;
            outline: none !important;
        }

        .red-cross-table .table,
        td {
            border: 1px solid #e1e1e1;
            padding: 15px 20px !important;
            outline: none !important;
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

    @yield('page-contents')
    @stack('scripts')
</body>

</html>
