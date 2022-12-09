@extends('admin.layout.master')

@section('page-contents')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="head-name d-flex justify-content-between ">
            <div>
                <h6>School data list</h6>
                <p>{{ date('Y') - 1 }} - {{ date('Y') }}</p>
            </div>
            <div class="d-flex">

                <div class="p-1">
                    <a href="{{ route('admin.export') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Export</a>
                </div>
                <div class="p-1">
                    <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="import_modal"><i
                            class="fas fa-upload fa-sm text-white-50"></i> Upload</a>

                    {{-- <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                          class="fas fa-upload fa-sm text-white-50">Import User Data</button>
                    </form> --}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Financial Year</h6>
                <a href="{{ route('admin.financial-year.create') }}" class="btn btn-primary btn-icon-split">
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
                                <th>Sl No.</th>
                                <th>Name</th>
                                <th>From(year)</th>
                                <th>To(Year)</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($financial_years as $index => $financial_year)
                                <tr>
                                    <td>{{ $financial_years->firstItem() + $index }}</td>
                                    <td>{{ $financial_year->name }}</td>
                                    <td>{{ $financial_year->from_date }}</td>
                                    <td>{{ $financial_year->to_date }}</td>
                                    <td>{{ $financial_year->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            <a href="{{ route('admin.financial-year.edit', $financial_year->id) }}"><i
                                                    class="bg-partial p-2 far fa-edit"></i></a>
                                            <a class="deleteRecord" data-id="form-submit-{{ $financial_year->id }}"
                                                data-route="{{ route('admin.financial-year.destroy', $financial_year->id) }}">
                                                <i class="bg-unpaid p-2 far fa-trash-alt"></i>
                                            </a>
                                            <form method="POST" id="form-submit-{{ $financial_year->id }}"
                                                action="{{ route('admin.financial-year.destroy', $financial_year->id) }}"
                                                hidden>
                                                @method('DELETE')
                                                @csrf
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                        </tbody>
                    </table>
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
        $(document).ready(function() {
            $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                $(".alert").slideUp(400);
            });
        })
    </script>
@endpush
