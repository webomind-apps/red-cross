@extends('admin.layout.master')
@section('page-contents')
    <!-- /.container-fluid -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Add Financial Year</h6>
                {{-- <a href="add-payment.html" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Update</span>
                                </a>  --}}
            </div>
            <div class="card-body">
                <form method="POST"
                    action=@if ($financial_year) {{ route('admin.financial-year.update', $financial_year->id) }}
                @else
                    {{ route('admin.financial-year.store') }} @endif>
                    @if ($financial_year)
                        @method('PATCH')
                    @endif
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                value="{{ $financial_year ? $financial_year->name : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="from date">From Date</label>
                            <input type="date" class="form-control" id="from_date" name="from_date"
                                placeholder="From date" value="{{ $financial_year ? $financial_year->from_date : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="to date">To Date</label>
                            <input type="date" class="form-control" id="to_date" name="to_date" placeholder="To Date"
                                value="{{ $financial_year ? $financial_year->to_date : '' }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="{{$financial_year ? ($financial_year->status ? '1' : '0') : '' }}">
                                    {{ $financial_year ? ($financial_year->status ? 'Active' : 'Inactive') : '--Select--' }}
                                </option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Comments</label>
                            <textarea type="text" class="form-control" id="comments" name="comments" placeholder="Comments">{{ $financial_year ? $financial_year->comment : '' }}</textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3">
                        @if ($financial_year)
                            <span class="text">Update</span>
                        @else
                            <span class="text">Add</span>
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
