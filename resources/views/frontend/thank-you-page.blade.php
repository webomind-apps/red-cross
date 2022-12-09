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
        .main-content i {
            font-size: 80px;
            padding: 30px 0;
            color: green;
        }
        .main-content__body{
            font-size: 18px;
        }
        span{
            color: #FF1414;
            font-weight: 500;
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
                        <a class="btns" href="#Contact"><span>Registration</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 bg-light p-5 mx-auto text-center">
                    <header>
                        <h1>THANK YOU!</h1>
                    </header>

                    <div class="main-content">
                        <i class="fa fa-check"></i>
                        <p class="main-content__body">
                            Thank you,
                            You have successfully paid amount of <b>XXX</b> for the year <b>XXXX</b>. <br><br>
                            The invoice has been mail to <span>xxx@gmail.com</span>. <br>
                            In case of any clarifications you can reach to <span>jrc@gmail.com</span> and also call us on <span>080-22268435</span>.   
                        </p>
                    </div>
                    <div class="col-lg-3 mt-5 mx-auto">
                        <a href="{{ url()->previous() }}" class="btns"><span>Back to home</span></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>
</html>