@extends('admin.layout.master')
@section('page-contents')
   
 <!-- /.container-fluid -->
 <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="my-auto font-weight-bold text-primary">Master Price</h6>
            <a href="{{ route('admin.master-price.create')}}" class="btn btn-primary btn-icon-split">
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
                            <th>Pricing Level</th>
                            <th>Price</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>School Registration Fees</td>
                            <td>1000</td>
                            <td>
                                <div class="hstack gap-3 flex-wrap">
                                    <a href="javascript:void(0);"><i class="bg-partial p-2 far fa-eye"></i></a>
                                    <a href="javascript:void(0);"><i class="bg-paid p-2 far fa-edit"></i></a>
                                    <a href="javascript:void(0);"><i class="bg-unpaid p-2 far fa-trash-alt"></i></a>
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>Student Registration Fees</td>
                            <td>100</td>
                            <td>
                                <div class="hstack gap-3 flex-wrap">
                                    <a href="javascript:void(0);"><i class="bg-partial p-2 far fa-eye"></i></a>
                                    <a href="javascript:void(0);"><i class="bg-paid p-2 far fa-edit"></i></a>
                                    <a href="javascript:void(0);"><i class="bg-unpaid p-2 far fa-trash-alt"></i></a>
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>College Registration Fees</td>
                            <td>1500</td>
                            <td>
                                <div class="hstack gap-3 flex-wrap">
                                    <a href="javascript:void(0);"><i class="bg-partial p-2 far fa-eye"></i></a>
                                    <a href="javascript:void(0);"><i class="bg-paid p-2 far fa-edit"></i></a>
                                    <a href="javascript:void(0);"><i class="bg-unpaid p-2 far fa-trash-alt"></i></a>
                                </div> 
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