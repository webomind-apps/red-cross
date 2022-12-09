  @extends('admin.layout.master')

  @section('page-contents')
      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <div class="head-name d-flex justify-content-between ">
              <div>
                  <h6>School data list</h6>
                  <p>{{ date('Y') - 1 }} - {{ date('Y') }}</p>
              </div>
              <div class="d-flex">

                  <div class="p-1">
                      <a href="{{ route('admin.export') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                              class="fas fa-download fa-sm text-white-50"></i> Export</a>
                  </div>
                  <div class="p-1">
                      {{-- <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="file" name="file" class="form-control"
                              accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          <button data-toggle="modal" data-target="#logoutModal1"></i>Import</button>
                      </form> --}}
                      <button data-toggle="modal" data-target="#ImportModal"
                          class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                              class="fas fa-upload fa-sm text-white-50"></i>Import</button>
                  </div>
              </div>
          </div>

      </div>
      <!-- /.container-fluid -->
      <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header d-flex justify-content-between py-3">
                  <h6 class="my-auto font-weight-bold text-primary">School Data</h6>
                  <a href="{{ route('admin.school-data.create') }}" class="btn btn-primary btn-icon-split">
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
                                  <th>Dise Code</th>
                                  <th>School Name</th>
                                  <th>Districts</th>
                                  <th>Show</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($school_datas as $index => $school_data)
                                  <tr>
                                      <td>{{ $school_datas->firstItem() + $index }}</td>
                                      <td>{{ $school_data->dise_code }}</td>
                                      <td>{{ $school_data->school_name }}</td>
                                      <td>{{ $school_data->district }}</td>
                                      <td>
                                          <a href="{{ route('admin.school-data.show', $school_data->id) }}"><button
                                                  type="button" class="btn btn-sm bg-paid">Details</button></a>
                                          <a class="deleteRecord" data-id="form-submit-{{ $school_data->id }}"
                                              data-route="{{ route('admin.school-data.destroy', $school_data->id) }}">
                                              <i class="bg-unpaid p-2 far fa-trash-alt"></i>
                                          </a>
                                          <form method="POST" id="form-submit-{{ $school_data->id }}"
                                              action="{{ route('admin.school-data.destroy', $school_data->id) }}" hidden>
                                              @method('DELETE')
                                              @csrf
                                          </form>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                      {{ $school_datas->links('pagination::bootstrap-4') }}
                  </div>
              </div>
          </div>
      </div>

      <div class="modal fade" id="ImportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  {{-- <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="file" name="file" class="form-control"
                          accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                      <button>Import</button>
                  </form> --}}

                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Cancel</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-footer" style="align-content: center !important">
                      <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="file" name="file" class="form-control"
                              accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                          <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                                  class="fas fa-upload fa-sm text-white-50"></i></button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!-- /.container-fluid -->
  @endsection
  @push('scripts')
      <script>
          $('.deleteRecord').on('click', function() {
              var id = $(this).data('id');
              if (confirm('Are you sure you want to delete this?')) {
                  $('#' + id + '').submit();
              }
          })
      </script>
  @endpush
