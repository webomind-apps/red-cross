@extends('admin.layout.master')

@section('page-contents')

<div class="p-1">
    <select name="year" id="year" class="custom-select custom-select-sm form-control form-control-sm">
        <option value="" name="year">Select year</option>
        @foreach ($years as $year)
            <option value="{{ $year->id }}" id="{{ $year->id }}"
                {{ request('year') == $year->id ? 'selected' : '' }}>
                {{ $year->name }} </option>
        @endforeach
    </select>
</div>
    <!-- Content Row -->
    <div class="h4">School Data</div>
    <div class="row mt-3">
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text pb-3">
                        Total number of Schools</div>
                    <div class="h5">{{ $total_schools }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"></a>
                        <div class="icon">
                            <i class="far fa-school" style="background-color: #d3f1ed; color: #0ab39f;"></i>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text pb-3">
                        Total Schools Paid</div>
                    <div class="h5">{{ $total_schools_paid }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"></a>
                        <div class="icon">
                            <i class="far fa-school" style="background-color: #d3f1ed; color: #0ab39f;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text pb-3">
                        Total Schools Not Paid</div>
                    <div class="h5">{{ $total_schools_not_paid }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"></a>
                        <div class="icon">
                            <i class="far fa-school" style="background-color: #d3f1ed; color: #0ab39f;"></i>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text pb-3">
                        Total Schools Partially Paid</div>
                    <div class="h5">{{ $total_schools_paid_partially }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"></a>
                        <div class="icon">
                            <i class="far fa-school" style="background-color: #d3f1ed; color: #0ab39f;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text pb-3">
                        Total Amount Collected</div>
                    <div class="h5">₹ {{ $paid_amount }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"></a>
                        <div class="icon">
                            <i class="fas fa-sack-dollar" style="background-color: #dde0ea; color: #405189;"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text pb-3">
                        Amount To Be Collected</div>
                    <div class="h5">₹ {{ $balance_amount }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"></a>
                        <div class="icon">
                            <i class="fas fa-sack-dollar" style="background-color: #dde0ea; color: #405189;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h4">College Data</div>
    <div class="row mt-3">
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text pb-3">
                        Total number of Colleges</div>
                    <div class="h5">{{ $total_colleges }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"></a>
                        <div class="icon">
                            <i class="far fa-school" style="background-color: #d3f1ed; color: #0ab39f;"></i>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text pb-3">
                        Total Colleges Paid</div>
                    <div class="h5">{{ $total_colleges_paid }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"></a>
                        <div class="icon">
                            <i class="far fa-school" style="background-color: #d3f1ed; color: #0ab39f;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text pb-3">
                        Total Colleges Not Paid</div>
                    <div class="h5">{{ $total_colleges_not_paid }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"></a>
                        <div class="icon">
                            <i class="far fa-school" style="background-color: #d3f1ed; color: #0ab39f;"></i>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text pb-3">
                        Total Colleges Partially Paid</div>
                    <div class="h5">{{ $total_colleges_paid_partially }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"></a>
                        <div class="icon">
                            <i class="far fa-school" style="background-color: #d3f1ed; color: #0ab39f;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text pb-3">
                        Total Amount Collected</div>
                    <div class="h5">₹ {{ $college_paid_amount }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"></a>
                        <div class="icon">
                            <i class="fas fa-sack-dollar" style="background-color: #dde0ea; color: #405189;"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text pb-3">
                        Amount To Be Collected</div>
                    <div class="h5">₹ {{ $college_bal_amount }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#"></a>
                        <div class="icon">
                            <i class="fas fa-sack-dollar" style="background-color: #dde0ea; color: #405189;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
@endsection


@push('scripts')
    <script>
        $('#year').on('change', function() {
            var val = $(this).val();
            // alert(val);
            var route = "{{ url()->current() }}";
            var newRoute = updateQueryStringParameter(window.location.href, 'year', val);
            window.location.href = newRoute;
        })

        function updateQueryStringParameter(uri, key, value) {
            var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
            var separator = uri.indexOf('?') !== -1 ? "&" : "?";
            if (uri.match(re)) {
                return uri.replace(re, '$1' + key + "=" + value + '$2');
            } else {
                return uri + separator + key + "=" + value;
            }
        }
    </script>
@endpush
