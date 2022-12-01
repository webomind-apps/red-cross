@extends('admin.layout.master')

@section('page-contents')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="head-name d-flex justify-content-between ">
            <div>
                <h6>Payment detail of all the schools</h6>
                <p>{{ date('Y') - 1 }} - {{ date('Y') }}</p>
            </div>
            <div class="d-flex">
                <div class="dropdown p-1">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Payment Status
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">All</a>
                        <a class="dropdown-item" href="#">Paid</a>
                        <a class="dropdown-item" href="#">Partially Paid</a>
                    </div>
                </div>
                <div class="p-1">
                    <select name="dataTable_length" aria-label="Default select example"
                        class="custom-select custom-select-sm form-control form-control-sm">
                        <option selected>Select District</option>
                        <option value="1">District 1</option>
                        <option value="2">District 2</option>
                        <option value="3">District 3</option>
                    </select>
                </div>
                <div class="p-1">
                    <select class="custom-select custom-select-sm form-control form-control-sm"
                        aria-label="Default select example">
                        <option selected>Year</option>
                        <option value="1">2022</option>
                        <option value="2">2021</option>
                        <option value="3">2020</option>
                    </select>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">Payment Details</h6>
                <a href="{{ route('admin.payment-details.create')}}" class="btn btn-primary btn-icon-split">
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
                                <th>Payment Year</th>
                                <th>Districts</th>
                                <th>Amount Paid</th>
                                <th>Amount Due</th>
                                <th>Status</th>
                                <th>View</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>01</td>
                                <td>School-1</td>
                                <td>2020-2021</td>
                                <td>Bangalore</td>
                                <td>5000</td>
                                <td>10500</td>

                                <td><span class="badge bg-paid">Paid</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm bg-paid" data-toggle="modal"
                                        data-target="#logoutModal">Details</button>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>02</td>
                                <td>School-2</td>
                                <td>2020-2021</td>
                                <td>Bangalore</td>
                                <td>5000</td>
                                <td>10500</td>

                                <td><span class="badge bg-unpaid">Not Paid</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm bg-paid" data-toggle="modal"
                                        data-target="#logoutModal">Details</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>03</td>
                                <td>School-3</td>
                                <td>2020-2021</td>
                                <td>Bangalore</td>
                                <td>5000</td>
                                <td>10500</td>

                                <td><span class="badge bg-partial">Partially Paid</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm bg-paid" data-toggle="modal"
                                        data-target="#logoutModal">Details</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-20" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>04</td>
                                <td>School-4</td>
                                <td>2020-2021</td>
                                <td>Bangalore</td>
                                <td>5000</td>
                                <td>10500</td>

                                <td><span class="badge bg-paid">Paid</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm bg-paid" data-toggle="modal"
                                        data-target="#logoutModal">Details</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>05</td>
                                <td>School-5</td>
                                <td>2020-2021</td>
                                <td>Bangalore</td>
                                <td>5000</td>
                                <td>10500</td>

                                <td><span class="badge bg-unpaid">Not Paid</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm bg-paid" data-toggle="modal"
                                        data-target="#logoutModal">Details</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>06</td>
                                <td>School-6</td>
                                <td>2020-2021</td>
                                <td>Bangalore</td>
                                <td>5000</td>
                                <td>10500</td>

                                <td><span class="badge bg-partial">Partially Paid</span></td>
                                <td>
                                    <button type="button" class="btn btn-sm bg-paid" data-toggle="modal"
                                        data-target="#logoutModal">Details</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
