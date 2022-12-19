@extends('admin.layout.master')

@section('page-contents')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="head-name d-flex justify-content-between ">
            <div>
                <h6>Payment detail of all the schools</h6>
                <p>{{ date('Y') - 1 }} - {{ date('Y') }}</p>
            </div>
            <div class="d-flex">
                {{-- <div class="dropdown p-1">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Payment Status
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">All</a>
                        <a class="dropdown-item" href="#">Paid</a>
                        <a class="dropdown-item" href="#">Partially Paid</a>
                    </div>
                </div> --}}
                <div class="p-1">
                    <select name="year" id="year"
                        class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="" name="year">Select Year</option>
                        @foreach ($years as $year)
                            <option value="{{ $year->id }}" id="{{ $year->id }}"
                                {{ request('year') == $year->id ? 'selected' : '' }}>
                                {{ $year->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="p-1">
                    <a href="{{ route('admin.school-registration-export') }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Export</a>
                </div>
                

                {{-- <div class="p-1">
                    <select name="dataTable_length" aria-label="Default select example"
                        class="custom-select custom-select-sm form-control form-control-sm">
                        <option selected>Select District</option>
                        <option value="1">District 1</option>
                        <option value="2">District 2</option>
                        <option value="3">District 3</option>
                    </select>
                </div> --}}

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Payment Details</h6>
                <a href="{{ route('admin.school-registration-payment.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                    </div>
                                </th>
                                <th>Dice Code</th>
                                <th>School Name</th>
                                {{-- <th>Payment Year</th> --}}
                                <th>Districts</th>
                                <th>Amount Paid</th>
                                {{-- <th>Amount Due</th> --}}
                                {{-- <th>Status</th> --}}
                                <th>View</th>

                            </tr>
                        </thead>

                        {{-- {{dd($school_registrations)}} --}}
                        <tbody>
                            @foreach ($school_registrations as $index => $school_registration)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                                value="option1">
                                        </div>
                                    </th>
                                    <td>{{ $school_registration->dise_code }}</td>
                                    <td>{{ $school_registration->school_name }}</td>
                                    {{-- <td>{{ $school_registration->name }}</td> --}}
                                    <td>{{ $school_registration->district }}</td>
                                    <td>{{ $school_registration->total_to_be_paid }}</td>
                                    {{-- <td>{{ $school_registration->balance }}</td> --}}
                                    {{-- @if ($school_registration->balance_amount == 0)
                                        <td><span class="badge bg-paid">Paid</span></td>
                                    @elseif($school_registration->balance_amount == $school_registration->total_fees)
                                        <td><span class="badge bg-unpaid">Not paid</span></td>
                                    @else
                                        <td><span class="badge bg-partial">Partially paid</span></td>
                                    @endif --}}
                                    <td>
                                        <a
                                            href="{{ route('admin.school-registration-payment.show', $school_registration->id) }}"><button
                                                type="button" class="btn btn-sm bg-paid">Details</button></a>
                                        <a class="deleteRecord" data-id="form-submit-{{ $school_registration->id }}"
                                            data-route="{{ route('admin.school-registration-payment.destroy', $school_registration->id) }}">
                                            <i class="bg-unpaid p-2 far fa-trash-alt"></i>
                                        </a>
                                        <form method="POST" id="form-submit-{{ $school_registration->id }}"
                                            action="{{ route('admin.school-registration-payment.destroy', $school_registration->id) }}"
                                            hidden>
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $school_registrations->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
@push('scripts')
    <script>
        $('.deleteRecord').on('click', function() {
            var id = $(this).data('id');
            if (confirm('Are you sure you want to delete this?')) {
                $('#' + id + '').submit();
            }
        })

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
