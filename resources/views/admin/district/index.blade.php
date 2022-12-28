@extends('admin.layout.master')
@section('page-contents')
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="my-auto font-weight-bold text-primary">Districts</h6>
            <a href="{{ route('admin.districts.create') }}" class="btn btn-primary btn-icon-split">
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
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($districts as $index => $district)
                            <tr>
                                <td>{{ $districts->firstItem() + $index }}</td>
                                <td>{{ $district->name }}</td>
                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="{{ route('admin.districts.edit', $district->id) }}"><i
                                                class="bg-partial p-2 far fa-edit"></i></a>
                                        <a class="deleteRecord" data-id="form-submit-{{ $district->id }}"
                                            data-route="{{ route('admin.districts.destroy', $district->id) }}">
                                            <i class="bg-unpaid p-2 far fa-trash-alt"></i>
                                        </a>
                                        <form method="POST" id="form-submit-{{ $district->id }}"
                                            action="{{ route('admin.districts.destroy', $district->id) }}"
                                            hidden>
                                            @method('DELETE')
                                            @csrf
                                        </form>

                                    </div>
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
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $('.deleteRecord').on('click', function() {
            var id = $(this).data('id');
            if (confirm('Are you sure you want to delete this?')) {
                $('#' + id + '').submit();
            }
        })
        $(document).ready(function() {
            $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                $(".alert").slideUp(400);
            });
        })
    </script>
@endpush
