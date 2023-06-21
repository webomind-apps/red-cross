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
                <form method="POST" action={{ route('admin.financial-year.store') }}>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Display format<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required
                                >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="from date">From Date<span style="color: red">*</span></label>
                            <input type="date" class="form-control" id="from_date" name="from_date"
                                placeholder="From date" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="to date">To Date<span style="color: red">*</span></label>
                            <input type="date" class="form-control" id="to_date" name="to_date" placeholder="To Date" required
                                >
                        </div>
                        <div class="form-group col-md-12">
                            <label for="status">Status<span style="color: red">*</span></label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">
                                     --Select--
                                </option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Comments</label>
                            <textarea type="text" class="form-control" id="comments" name="comments" placeholder="Comments"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3">
                        <span class="text">Add</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
