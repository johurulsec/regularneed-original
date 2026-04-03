@extends('backend.layouts.master')

@section('title', 'E-commerce || Banner Create')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Add Banner</h5>
        <div class="card-body">
            <form method="post" action="{{ route('banner.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <!-- Title -->
                    <div class="form-group col-md-6">
                        <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                            value="{{ old('title') }}" class="form-control">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="form-group col-md-6">
                        <label for="category_id" class="col-form-label">Category (optional)</label>
                        <select name="category_id" class="form-control">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <!-- Description -->
                    <div class="form-group col-md-6">
                        <label for="inputDesc" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Banner URL -->
                    <div class="form-group col-md-6">
                        <label for="url" class="col-form-label">Banner URL (optional)</label>
                        <input id="url" type="text" name="url" placeholder="Enter URL"
                            value="{{ old('url') }}" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <!-- Photo -->
                    <div class="form-group col-md-6 mb-3">
                        <label for="photo" class="form-label">Photo <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">

                        <div id="preview" style="margin-top:15px; max-height:100px;">
                            <img id="preview-img" src="#" alt="Preview" style="max-height:100px; display:none;">
                        </div>

                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-group col-md-6">
                        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Buttons -->
                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>


@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#photo').on('change', function() {
                let input = this;
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview-img').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>
@endpush
