@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Edit Category</h5>
        <div class="card-body">
            {{-- <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Title -->
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                        value="{{ old('title', $category->title) }}" class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Summary -->
                <div class="form-group">
                    <label for="summary" class="col-form-label">Summary</label>
                    <textarea class="form-control" id="summary" name="summary">{{ old('summary', $category->summary) }}</textarea>
                    @error('summary')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Is Parent -->
                <div class="form-group">
                    <label for="is_parent">Is Parent</label><br>
                    <input type="checkbox" name="is_parent" id="is_parent" value="1"
                        {{ $category->is_parent == 1 ? 'checked' : '' }}> Yes
                </div>

                <!-- Parent Category -->
                <div class="form-group {{ $category->is_parent == 1 ? 'd-none' : '' }}" id="parent_cat_div">
                    <label for="parent_id">Parent Category</label>
                    <select name="parent_id" class="form-control">
                        <option value="">--Select any category--</option>
                        @foreach ($parent_cats as $parent_cat)
                            <option value="{{ $parent_cat->id }}"
                                {{ $parent_cat->id == old('parent_id', $category->parent_id) ? 'selected' : '' }}>
                                {{ $parent_cat->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">

                    <div id="preview" style="margin-top:15px; max-height:100px;">
                        @if ($category->photo && file_exists(public_path($category->photo)))
                            <img id="preview-img" src="{{ asset($category->photo) }}" alt="Preview"
                                style="max-height:100px;">
                        @else
                            <img id="preview-img" src="#" alt="Preview" style="max-height:100px; display:none;">
                        @endif
                    </div>

                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="active" {{ old('status', $category->status) == 'active' ? 'selected' : '' }}>Active
                        </option>
                        <option value="inactive" {{ old('status', $category->status) == 'inactive' ? 'selected' : '' }}>
                            Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form> --}}
            <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row">
                    <!-- Title -->
                    <div class="form-group col-md-6">
                        <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                            value="{{ old('title', $category->title) }}" class="form-control">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-group col-md-6">
                        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="active" {{ old('status', $category->status) == 'active' ? 'selected' : '' }}>
                                Active</option>
                            <option value="inactive" {{ old('status', $category->status) == 'inactive' ? 'selected' : '' }}>
                                Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Summary -->
                    <div class="form-group col-md-12">
                        <label for="summary" class="col-form-label">Summary</label>
                        <textarea class="form-control" id="summary" name="summary">{{ old('summary', $category->summary) }}</textarea>
                        @error('summary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Is Parent -->
                    <div class="form-group col-md-6">
                        <label for="is_parent">Is Parent</label><br>
                        <input type="checkbox" name="is_parent" id="is_parent" value="1"
                            {{ $category->is_parent == 1 ? 'checked' : '' }}> Yes
                    </div>

                    <!-- Parent Category -->
                    <div class="form-group col-md-6 {{ $category->is_parent == 1 ? 'd-none' : '' }}" id="parent_cat_div">
                        <label for="parent_id">Parent Category</label>
                        <select name="parent_id" class="form-control">
                            <option value="">--Select any category--</option>
                            @foreach ($parent_cats as $parent_cat)
                                <option value="{{ $parent_cat->id }}"
                                    {{ $parent_cat->id == old('parent_id', $category->parent_id) ? 'selected' : '' }}>
                                    {{ $parent_cat->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <!-- Photo -->
                    <div class="form-group col-md-6">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">

                        <div id="preview" style="margin-top:15px; max-height:100px;">
                            @if ($category->photo && file_exists(public_path($category->photo)))
                                <img id="preview-img" src="{{ asset($category->photo) }}" alt="Preview"
                                    style="max-height:100px;">
                            @else
                                <img id="preview-img" src="#" alt="Preview" style="max-height:100px; display:none;">
                            @endif
                        </div>

                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Update</button>
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
        // Summernote
        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Write short description...",
                tabsize: 2,
                height: 150
            });
        });

        // Toggle Parent Category Dropdown
        $('#is_parent').change(function() {
            if ($(this).prop('checked')) {
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
