@extends('admin.layout.master')
@section('page-contents')
    <!-- /.container-fluid -->
    <div class="container-fluid">
        {{-- {{ dd($signature) }} --}}
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h6 class="my-auto font-weight-bold text-primary">General Secretary Signature</h6>

            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data"
                    action=@if ($signature) {{ route('admin.general-secretary-signature.update', $signature->id) }}
                @else
                    {{ route('admin.general-secretary-signature.store') }} @endif>
                    @if ($signature)
                        @method('PATCH')
                    @endif
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="School Registartion Annual fee">Name<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="name"
                                name="name" placeholder="Name"
                                value="{{ $signature ? $signature->name : '' }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="Signature Image">Signature Image<span style="color: red">*</span></label>
                            <input type="file" class="form-control" id="signature" name="signature"
                                placeholder="Signature" accept="image/png, image/jpeg" required>
                            @error('signature')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if ($signature)
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="image-section">
                                    <div class="image"> <img src="{{ asset("storage/$signature->signature") }}"
                                            height="50px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <button class="btn btn-primary mt-3">
                        @if ($signature)
                            <span class="text">Update</span>
                        @else
                            <span class="text">Add</span>
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
