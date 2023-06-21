@extends('admin.layout.master')
@section('page-contents')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Add Circular document</h6>

            </div>
            <div class="card-body">
                <form method="POST" action={{ route('admin.circulars.store') }} enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Title<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="from date">Circular document<span style="color: red">*</span></label>
                            <input type="file" class="form-control" id="document" name="document"
                                placeholder="Circular document" accept="application/pdf" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="to date">Comments</label>
                            <input type="text" class="form-control" id="comments" name="comments"
                                placeholder="Comments">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="to date">Status<span style="color: red">*</span></label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="" name="email_templates">--Select--</option>
                                <option value="1" name="email_templates">Active</option>
                                <option value="0" name="email_templates">Inactive</option>
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
@endsection
