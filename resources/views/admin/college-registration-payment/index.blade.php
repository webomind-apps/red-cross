@extends('admin.layout.master')

@section('page-contents')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="head-name d-flex justify-content-between ">
            <div>
                <h6>Payment detail of all the colleges</h6>
                <p>{{ $current_year->name }}</p>
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
                    <select name="year" id="year" class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="" name="year">Select year</option>
                        @foreach ($years as $year)
                            <option value="{{ $year->id }}" id="{{ $year->id }}"
                                {{ request('year') == $year->id ? 'selected' : '' }}>
                                {{ $year->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="p-1">
                    <select name="district" id="district"
                        class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="" name="district">Select district</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->district }}" id="{{ $district }}"
                                {{ request('district') == $district->district ? 'selected' : '' }}>
                                {{ $district->district }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="p-1">
                    <select name="college" id="college"
                        class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="" name="year">Select college</option>
                        @foreach ($colleges as $college)
                            <option value="{{ $college->id }}" id="{{ $college->id }}"
                                {{ request('college') == $college->id ? 'selected' : '' }}>
                                {{ $college->college_name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="p-1">
                    <a href="{{ route('admin.college-registration-export') }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Export</a>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Payment Details</h6>
                <a href="{{ route('admin.college-registration-payment.create') }}" class="btn btn-primary btn-icon-split">
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
                                <th>college Name</th>
                                <th>Payment Year</th>
                                <th>Districts</th>
                                <th>Total Amount</th>
                                <th>Amount Paid</th>
                                <th>Amount Due</th>
                                <th>Status</th>

                            </tr>
                        </thead>

                        {{-- {{dd($college_registrations->year_id)}} --}}
                        <tbody>
                            @foreach ($college_registrations as $index => $college_registration)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                                value="option1">
                                        </div>
                                    </th>
                                    <td>{{ $college_registration->dise_code }}</td>
                                    <td>{{ $college_registration->college_name }}</td>
                                    <td>{{ $college_registration->name }}</td>
                                    <td>{{ $college_registration->district }}</td>
                                    <td>{{ $college_registration->total_amount }}</td>
                                    <td>{{ $college_registration->amount_to_be_paid }}</td>
                                    <td>{{ $college_registration->balance }}</td>

                                    @if ($college_registration->balance == 0)
                                        <td><span class="badge bg-paid">Fully Paid</span></td>
                                    @elseif($college_registration->balance == $college_registration->total_amount)
                                        <td><span class="badge bg-unpaid">Not paid</span></td>
                                    @elseif($college_registration->balance > 0 && $college_registration->balance < $college_registration->total_amount)
                                        <td><span class="badge bg-partial">Partially paid</span></td>
                                    @endif
                                    <td>
                                        {{-- <a
                                            href="{{ route('admin.college-registration-payment.show', $college_registration->college_id, $college_registration->year_id) }}"><button
                                                type="button" class="btn btn-sm bg-paid">Details</button></a> --}}
                                        <a
                                            href="{{ route('admin.college-registration-payment.show', ['id' => $college_registration->college_id, 'year' => $college_registration->year_id]) }}"><button
                                                type="button" class="btn btn-sm bg-paid">Details</button></a>

                                        {{-- <a class="deleteRecord" data-id="form-submit-{{ $college_registration->college_id }}"
                                            data-route="{{ route('admin.college-registration-payment.destroy', ['id' => $college_registration->college_id, 'year' => $college_registration->year_id]) }}">
                                            <i class="bg-unpaid p-2 far fa-trash-alt"></i>
                                        </a> --}}
                                        <form method="POST" id="form-submit-{{ $college_registration->college_id }}"
                                            action="{{ route('admin.college-registration-payment.destroy', $college_registration->college_id) }}"
                                            hidden>
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $college_registrations->links('pagination::bootstrap-4') }}
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
        $('#college').on('change', function() {
            var val = $(this).val();
            // alert(val);
            var route = "{{ url()->current() }}";
            var newRoute = updateQueryStringParameter(window.location.href, 'college', val);
            window.location.href = newRoute;
        })
        $('#district').on('change', function() {
            var val = $(this).val();
            // alert(val);
            var route = "{{ url()->current() }}";
            var newRoute = updateQueryStringParameter(window.location.href, 'district', val);
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
