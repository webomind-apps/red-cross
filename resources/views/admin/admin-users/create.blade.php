@extends('admin.layout.master')
@section('page-contents')
    <!-- /.container-fluid -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Add User</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.admins.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Emails</label>
                            <input type="text" class="form-control" id="email" name="emails"
                                placeholder="admin@gmail.com, hi@example.com" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="to date">Admin Type(School/College)<span style="color: red">*</span></label>
                            <select name="admin_type" id="admin_type" class="form-control" required>
                                <option value="" name="email_templates">--Select--</option>
                                <option value="1" name="email_templates">School</option>
                                <option value="0" name="email_templates">College</option>
                                <option value="2" name="email_templates">JRC Examination</option>
                            </select>
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
