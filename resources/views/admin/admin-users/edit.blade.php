@extends('admin.layout.master')
@section('page-contents')
    <!-- /.container-fluid -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Update Admin Details</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                value="{{ $admin->name }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="emails" name="emails" placeholder="Email"
                                value="{{ $admin->admin_emails }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="to date">Admin Type<span style="color: red">*</span></label>
                            <select name="admin_type" id="admin_type" class="form-control">
                                <option value={{$admin->admin_type}}>@if($admin->admin_type == 0) College @elseif($admin->admin_type == 1) School @elseif($admin->admin_type == 2) Jrc Examination @endif </option>
                                <option value="1" name="email_templates">School</option>
                                <option value="0" name="email_templates">College</option>
                                <option value="2" name="email_templates">JRC Examination</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3">
                        <span class="text">Update</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
