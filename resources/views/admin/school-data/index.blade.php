  @extends('admin.layout.master')

  @section('page-contents')
      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <div class="head-name d-flex justify-content-between ">
              <div>
                  <h6>School data list</h6>
                  <p>{{ $current_year->name }}</p>
              </div>




              <div class="p-1" id="bulk_update_section" style="display: none">
                  <select name="email_templates" id="email_templates"
                      class="custom-select custom-select-sm form-control form-control-sm">
                      <option value="" name="email_templates">Select Email template</option>
                      @foreach ($email_templates as $email_template)
                          <option value="{{ $email_template->id }}" id="{{ $email_template->id }}"
                              {{ request('email_template') == $email_template->id ? 'selected' : '' }}>
                              {{ $email_template->title }} </option>
                      @endforeach
                  </select>
              </div>

              <div class="p-1">
                  <form action="{{ route('admin.search') }}" method="GET"
                      class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                      @csrf
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for..."
                              aria-label="Search" aria-describedby="basic-addon2" id="search" name="search">
                          <div class="input-group-append">
                              <button class="btn btn-primary" type="submit">
                                  <i class="fas fa-search fa-sm"></i>
                              </button>
                          </div>
                      </div>
                  </form>
              </div>



              <div class="d-flex">

                  <div class="p-1">
                      <a href="{{ route('admin.export') }}"
                          class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                              class="fas fa-download fa-sm text-white-50"></i> Download</a>
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
                              class="fas fa-upload fa-sm text-white-50"></i>Upload</button>
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
                                  <th scope="row">
                                      <div class="form-check">
                                          <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                              id="checkAll" value="option1">
                                      </div>
                                  </th>
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
                                      <th scope="row">
                                          <div class="form-check">
                                              <input class="form-check-input fs-15 reg-checkbox" type="checkbox"
                                                  name="checkOne[]" value={{ $school_data->id }}>
                                          </div>
                                      </th>
                                      <td>{{ $school_datas->firstItem() + $index }}</td>
                                      <td>{{ $school_data->dise_code }}</td>
                                      <td>{{ $school_data->school_name }}</td>
                                      <td>{{ $school_data->district }}</td>
                                      <td>
                                          <a href="{{ route('admin.school-data.show', $school_data->id) }}"><button
                                                  type="button" class="btn btn-sm bg-paid">Details</button></a>

                                          <a href="{{ route('admin.school-data.edit', $school_data->id) }}"><i
                                                  class="bg-partial p-2 far fa-edit"></i></a>
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
                              @if (session()->has('success'))
                                  <div class="alert alert-success">
                                      {{ session()->get('success') }}
                                  </div>
                              @endif
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
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Cancel</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>

                  <div class="modal-footer" style="align-content: center !important">
                      <div>
                          <label>Excel format to upload</label>
                          <a href="{{ asset('admin/img/school-data.xlsx') }}">
                              <button class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Download</button>
                          </a>
                      </div>
                      <div>
                          <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="file" name="file" class="form-control" accept=".xlsx, .xls, .csv">
                              <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                                      class="fas fa-upload fa-sm text-white-50"></i></button>
                          </form>
                      </div>

                  </div>
              </div>
          </div>
      </div>

      <form id="submit-form" action="{{ route('admin.send-bulk-mail') }}" method="post" hidden>
          {{ csrf_field() }}
          <input type="hidden" id="email_template" name="email_template">
          <input type="hidden" id="school_ids" name="school_ids">
      </form>
  @endsection
  @push('scripts')
      <script>
          $('.deleteRecord').on('click', function() {
              var id = $(this).data('id');
              if (confirm('Are you sure you want to delete this?')) {
                  $('#' + id + '').submit();
              }
          })

          var masterCheck = $("#checkAll");

          var listCheckItems = $(".reg-checkbox");

          var getCheckedValues = [];

          // Click Event on Master Check
          masterCheck.on("click", function() {
              var isMasterChecked = $(this).is(":checked");
              listCheckItems.prop("checked", isMasterChecked);
              $('#bulk_update_section').css('display', 'block');
              getSelectedItems();
          });


          // Change Event on each item checkbox
          listCheckItems.on("change", function() {
              // Total Checkboxes in list
              var totalItems = listCheckItems.length;
              // Total Checked Checkboxes in list
              var checkedItems = listCheckItems.filter(":checked").length;

              //If all are checked
              if (totalItems == checkedItems) {
                  masterCheck.prop("indeterminate", false);
                  masterCheck.prop("checked", true);
                  $('#bulk_update_section').css('display', 'block');
              }
              // Not all but only some are checked
              else if (checkedItems > 0 && checkedItems < totalItems) {
                  masterCheck.prop("indeterminate", true);
                  $('#bulk_update_section').css('display', 'block');
              }
              //If none is checked
              else {
                  masterCheck.prop("indeterminate", false);
                  masterCheck.prop("checked", false);
                  $('#bulk_update_section').css('display', 'none');
              }
              getSelectedItems();
          });

          function getSelectedItems() {
              getCheckedValues = [];
              listCheckItems.filter(":checked").each(function() {
                  getCheckedValues.push($(this).val());
              });
              if (getCheckedValues.length == 0) {
                  $('#bulk_update_section').css('display', 'none');
              }
              $('#school_ids').val(JSON.stringify(getCheckedValues));
          }

          $('#email_templates').change(function() {
              var value = $(this).val();
              if (confirm('Are you sure you want to perform this action?')) {
                  //    alert(value);
                  $('#email_template').val(value);
                  $('#submit-form').submit();
              } else {
                  $(this).val("");
              }
          });

          $(document).ready(function() {
              $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                  $(".alert").slideUp(400);
              });
          })
      </script>
  @endpush
