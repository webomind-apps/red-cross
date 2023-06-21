@extends('frontend.main')

@section('page-contents')
    <section class="ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mb-3 mx-auto">
                    <h1 class="header-underline text-uppercase">Circulars <span class="fs-6 text-capitalize">
                            (Academic year {{ $year ? $year->name : '' }} )</span> </h1>
                </div>
            </div>


            <div class="red-cross-table shadow-sm">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4">Title</th>
                                    <th scope="col">Document Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($circulars as $circular)
                                    <tr>
                                        <td colspan="4">{{ $circular->title }}</td>
                                        <td><a href="{{ asset("storage/$circular->document") }}" target="_blank">
                                                click here for the document
                                            </a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>

            </div>
            <div class="col-lg-3 mt-5 mx-auto">
                <a href="{{ url()->previous() }}" class="circular-btn"><span> Back </span></a>
            </div>
        </div>
    </section>
@endsection
