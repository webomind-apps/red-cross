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
