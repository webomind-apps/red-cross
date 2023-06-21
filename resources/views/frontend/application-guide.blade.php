@extends('frontend.main')

@section('page-contents')
    <section class="ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mb-3 mx-auto">
                    <h1 class="header-underline text-uppercase">Application Guide <span class="fs-6 text-capitalize">
                            (Academic year {{ $year ? $year->name : '' }} )</span> </h1>
                </div>
            </div>


            <div class="red-cross-table shadow-sm">
                <div class="row">
                    <div class="col-lg-5 mx-auto">

                        <video width="100%" height="340" controls poster="{{ asset('admin/img/thumbnail.jpg') }}">
                            <source src="{{ asset('admin/img/guide.mp4') }}" type="video/mp4">
                            <source src="{{ asset('admin/img/guide.mp4') }}" type="video/ogg">
                            Your browser does not support the video tag.

                        </video>

                        <center><span class="fs-6 text-capitalize">Guide to register and pay fees.</span></center>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 mt-5 mx-auto">
                <a href="{{ url()->previous() }}" class="circular-btn"><span> Back </span></a>
            </div>
        </div>
    </section>
@endsection
