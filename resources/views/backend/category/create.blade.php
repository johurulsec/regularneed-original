@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Add Category</h5>
        <div class="card-body">
            <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                            value="{{ old('title') }}" class="form-control">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

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

                    <div class="form-group col-12">
                        <label for="summary" class="col-form-label">Summary</label>
                        <textarea class="form-control" id="summary" name="summary">{{ old('summary') }}</textarea>
                        @error('summary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="is_parent">Is Parent</label><br>
                        <input type="checkbox" name='is_parent' id='is_parent' value='1' checked> Yes
                    </div>

                    <div class="form-group col-md-6 d-none" id='parent_cat_div'>
                        <label for="parent_id">Parent Category</label>
                        <select name="parent_id" class="form-control">
                            <option value="">--Select any category--</option>
                            @foreach ($parent_cats as $parent_cat)
                                <option value="{{ $parent_cat->id }}">{{ $parent_cat->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="photo" class="form-label">Photo <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                        <div id="preview" style="margin-top:15px; max-height:100px;">
                            <img id="preview-img" src="#" alt="Preview" style="max-height:100px; display:none;">
                        </div>
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

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
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>

    <script>
        // Summernote
        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Write short description...",
                tabsize: 2,
                height: 120
            });
        });

        // Parent category toggle
        $('#is_parent').change(function() {
            if ($(this).is(':checked')) {
                $('#parent_cat_div').addClass('d-none');
                $('#parent_cat_div select').val('');
            } else {
                $('#parent_cat_div').removeClass('d-none');
            }
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
