  @extends('admin.layout.master')

  @section('page-contents')
      <!-- /.container-fluid -->
      <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header d-flex justify-content-between py-3">
                  <h6 class="my-auto font-weight-bold text-primary">Add Your School Data</h6>
                  <!-- <a href="add-payment.html" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Update</span>
                </a> -->
              </div>
              <div class="card-body">
                  <form>
                      <div class="form-row">
                          <div class="form-group col-md-3">
                              <label for="inputEmail4">Dice No</label>
                              <input type="text" class="form-control" id="inputEmail4" placeholder="KN00123">
                          </div>
                          <div class="form-group col-md-4">
                              <label for="inputPassword4">School Name</label>
                              <input type="text" class="form-control" id="inputPassword4" placeholder="Bethany">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="inputAddress">District</label>
                              <input type="text" class="form-control" id="inputAddress" placeholder="Bangalore">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-4">
                              <label for="inputAddress2">Address</label>
                              <input type="text" class="form-control" id="inputAddress2"
                                  placeholder="Apartment, studio, or floor">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="inputPassword4">Contact No</label>
                              <input type="text" class="form-control" id="inputPassword4" placeholder="890989079">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="inputAddress">Secondary Contact No</label>
                              <input type="text" class="form-control" id="inputAddress" placeholder="9090900000">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-4">
                              <label for="inputEmail4">Mail Id</label>
                              <input type="text" class="form-control" id="inputEmail4" placeholder="bethany@gmail.com">
                          </div>
                          <div class="form-group col-md-4">
                              <label for="inputPassword4">Secondary Mail Id</label>
                              <input type="text" class="form-control" id="inputPassword4"
                                  placeholder="contactbethany@gmail.com">
                          </div>
                      </div>
                      <button class="btn btn-primary mt-3">
                          <!-- <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span> -->
                          <span class="text">Update</span>
                      </button>
                  </form>
              </div>
          </div>

      </div>
      <!-- /.container-fluid -->
  @endsection
