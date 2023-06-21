@extends('admin.layout.master')
@section('page-contents')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Add Email templates</h6>
               
            </div>
            <div class="card-body">
                <form method="POST" action={{ route('admin.email-templates.store') }}>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="from date">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="to date">Email Body</label>
                            <input type="text" class="form-control" id="email_body" name="email_body" placeholder="Email body" required>
                        </div>
                       
                        {{-- <div class="form-group col-md-12">
                            <label for="inputAddress2">To mails</label>
                            <input type="text" class="form-control" id="emails_to" name="emails_to" placeholder="To mails" required>
                        </div> --}}
                    </div>
                    <button class="btn btn-primary mt-3">
                        <span class="text">Add</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
