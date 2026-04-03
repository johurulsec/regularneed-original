{{-- @extends('backend.layouts.master')

@section('main-content')
<div class="card">
    <h5 class="card-header">Edit Post</h5>
    <div class="card-body">
        <form method="post" action="{{ route('settings.update') }}">
            @csrf
            <div class="form-group">
                <label for="short_des" class="col-form-label">Short Description <span
                        class="text-danger">*</span></label>
                <textarea class="form-control" id="quote" name="short_des">{{ $data->short_des }}</textarea>
                @error('short_des')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="col-form-label">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="description" name="description">{{ $data->description }}</textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Logo -->
            <div class="form-group col-md-6 mb-3">
                <label for="photo" class="form-label">Photo <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="photo" name="logo" value="{{ $data->logo }}"
                    accept="image/*">

                <div id="preview" style="margin-top:15px; max-height:100px;">
                    <img id="preview-img" src="#" alt="Preview" style="max-height:100px; display:none;">
                </div>

                @error('photo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Favicon -->
            <div class="form-group col-md-6 mb-3">
                <label for="photo" class="form-label">Favicon <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="photo" name="photo" value="{{ $data->photo }}"
                    accept="image/*">

                <div id="previewFavicon" style="margin-top:15px; max-height:50px;">
                    <img id="preview-imgFavicon" src="#" alt="Preview" style="max-height:50px; display:none;">
                </div>

                @error('photo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="address" required value="{{ $data->address }}">
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" required value="{{ $data->email }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone" class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="phone" required value="{{ $data->phone }}">
                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');
    $('#lfm1').filemanager('image');
    $(document).ready(function () {
        $('#summary').summernote({
            placeholder: "Write short description.....",
            tabsize: 2,
            height: 150
        });
    });

    $(document).ready(function () {
        $('#quote').summernote({
            placeholder: "Write short Quote.....",
            tabsize: 2,
            height: 100
        });
    });

    $(document).ready(function () {
        $('#description').summernote({
            placeholder: "Write detail description.....",
            tabsize: 2,
            height: 150
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#photo').on('change', function () {
            let input = this;
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview-img').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#photo').on('change', function () {
            let input = this;
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview-imgFavicon').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>
@endpush --}}




@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Edit Settings</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="col-form-label">Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" value="{{ $data->title }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="col-form-label">Short Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="quote" name="short_des">{{ $data->short_des }}</textarea>

                    @error('short_des')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="col-form-label">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="description" name="description">{{ $data->description }}</textarea>

                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <!-- Logo -->
                    <div class="form-group col-md-6 mb-3">
                        <label for="logo" class="form-label">Logo <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*">

                        <div style="margin-top:15px; max-height:100px;">
                            <img id="preview-logo" src="{{ $data->logo ? asset($data->logo) : '' }}" alt="Logo Preview"
                                style="max-height:100px;">
                        </div>

                        @error('logo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Favicon -->
                    <div class="form-group col-md-6 mb-3">
                        <label for="favicon" class="form-label">Favicon <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="favicon" name="photo" accept="image/*">

                        <div style="margin-top:15px; max-height:50px;">
                            <img id="preview-favicon" src="{{ $data->photo ? asset($data->photo) : '' }}"
                                alt="Favicon Preview" style="max-height:50px;">
                        </div>

                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label class="col-form-label">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="address" required value="{{ $data->address }}">

                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" required value="{{ $data->email }}">

                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" required value="{{ $data->phone }}">

                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $('#lfm').filemanager('image');
        $('#lfm1').filemanager('image');

        $('#quote').summernote({ placeholder: "Write short quote...", height: 100 });
        $('#description').summernote({ placeholder: "Write detail description...", height: 150 });

        // Logo Preview
        $('#logo').on('change', function () {
            let reader = new FileReader();
            reader.onload = e => $('#preview-logo').attr('src', e.target.result);
            reader.readAsDataURL(this.files[0]);
        });

        // Favicon Preview
        $('#favicon').on('change', function () {
            let reader = new FileReader();
            reader.onload = e => $('#preview-favicon').attr('src', e.target.result);
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endpush