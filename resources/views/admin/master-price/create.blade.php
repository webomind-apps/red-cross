@extends('admin.layout.master')
@section('page-contents')
    <!-- /.container-fluid -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Add Your Payment Details</h6>
                <!-- <a href="add-payment.html" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Update</span>
                    </a> -->
            </div>
            <div class="card-body">
                <form action="{{route('admin.master-price.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="Pricing Level">Pricing level</label>
                            <input type="text" class="form-control" id="pricing_level" name="pricing_level"
                                placeholder="Pricing Level">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price">
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
