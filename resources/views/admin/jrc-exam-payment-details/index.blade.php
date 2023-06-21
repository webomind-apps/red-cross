@extends('admin.layout.master')

@section('page-contents')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="head-name d-flex justify-content-between ">
            <div>
                <h6>Jrc Exam Payment detail of all the schools</h6>
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
                {{-- <div class="p-1">
                    <select name="dataTable_length" aria-label="Default select example"
                        class="custom-select custom-select-sm form-control form-control-sm">
                        <option selected>Select District</option>
                        <option value="1">District 1</option>
                        <option value="2">District 2</option>
                        <option value="3">District 3</option>
                    </select>
                </div> --}}
                {{-- <div class="p-1">
                    <select class="custom-select custom-select-sm form-control form-control-sm"
                        aria-label="Default select example">
                        <option selected>Year</option>
                        <option value="1">2022</option>
                        <option value="2">2021</option>
                        <option value="3">2020</option>
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
                <a href="{{ route('admin.jrc-exam-payment-details.create') }}" class="btn btn-primary btn-icon-split">
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
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($jrc_examination_payments as $index => $jrc_examination_payment)
                                @if ($jrc_examination_payment->school_id)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                                    value="option1">
                                            </div>
                                        </th>
                                        @php
                                            $details = \App\Models\SchoolData::where('id', $jrc_examination_payment->school_id)->first();
                                        @endphp
                                        <td>{{ $details->dise_code }}</td>
                                        <td>{{ $details->school_name }}</td>
                                        {{-- <td>2020-2021</td> --}}
                                        <td>{{ $details->district }}</td>
                                        <td>{{ $jrc_examination_payment->total_to_be_paid }}</td>
                                        {{-- <td>10500</td> --}}

                                        <td><span class="badge bg-paid">Paid</span></td>
                                        <td>
                                            <a
                                                href="{{ route('admin.jrc-exam-payment-details.show', $jrc_examination_payment->id) }}"><button
                                                    type="button" class="btn btn-sm bg-paid">Details</button></a>
                                            <a class="deleteRecord" data-id="form-submit-{{ $jrc_examination_payment->id }}"
                                                data-route="{{ route('admin.jrc-exam-payment-details.destroy', $jrc_examination_payment->id) }}">
                                                <i class="bg-unpaid p-2 far fa-trash-alt"></i>
                                            </a>
                                            <form method="POST" id="form-submit-{{ $jrc_examination_payment->id }}"
                                                action="{{ route('admin.jrc-exam-payment-details.destroy', $jrc_examination_payment->id) }}"
                                                hidden>
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @elseif($jrc_examination_payment->college_id)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                                    value="option1">
                                            </div>
                                        </th>
                                        @php
                                            $details = \App\Models\CollegeData::where('id', $jrc_examination_payment->college_id)->first();
                                        @endphp
                                        <td>{{ $details->dise_code }}</td>
                                        <td>{{ $details->college_name }}</td>
                                        {{-- <td>2020-2021</td> --}}
                                        <td>{{ $details->district }}</td>
                                        <td>{{ $jrc_examination_payment->total_to_be_paid }}</td>
                                        {{-- <td>10500</td> --}}

                                        <td><span class="badge bg-paid">Paid</span></td>
                                        <td>
                                            <a
                                                href="{{ route('admin.jrc-exam-payment-details.show', $jrc_examination_payment->id) }}"><button
                                                    type="button" class="btn btn-sm bg-paid">Details</button></a>
                                            <a class="deleteRecord"
                                                data-id="form-submit-{{ $jrc_examination_payment->id }}"
                                                data-route="{{ route('admin.jrc-exam-payment-details.destroy', $jrc_examination_payment->id) }}">
                                                <i class="bg-unpaid p-2 far fa-trash-alt"></i>
                                            </a>
                                            <form method="POST" id="form-submit-{{ $jrc_examination_payment->id }}"
                                                action="{{ route('admin.jrc-exam-payment-details.destroy', $jrc_examination_payment->id) }}"
                                                hidden>
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{ $jrc_examination_payments->links('pagination::bootstrap-4') }}
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
    </script>
@endpush
