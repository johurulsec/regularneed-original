@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Add Product</h5>
        <div class="card-body">
            {{-- <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
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

                    <!-- Summary -->
                    <div class="form-group col-md-6">
                        <label for="summary" class="col-form-label">Summary <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="summary" name="summary">{{ old('summary') }}</textarea>
                        @error('summary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-group col-md-12">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Is Featured -->
                    <div class="form-group col-md-6">
                        <label for="is_featured">Is Featured</label><br>
                        <input type="checkbox" name="is_featured" id="is_featured" value="1" checked> Yes
                    </div>

                    <!-- Category -->
                    <div class="form-group col-md-6">
                        <label for="cat_id">Category <span class="text-danger">*</span></label>
                        <select name="cat_id" id="cat_id" class="form-control">
                            <option value="">--Select any category--</option>
                            @foreach ($categories as $cat_data)
                                <option value="{{ $cat_data->id }}">{{ $cat_data->title }}</option>
                            @endforeach
                        </select>
                        @error('cat_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 d-none" id="child_cat_div">
                        <label for="child_cat_id">Sub Category</label>
                        <select name="child_cat_id" id="child_cat_id" class="form-control">
                            <option value="">--Select any category--</option>
                            @foreach ($parent_cats as $key => $parent_cat)
                                <option value='{{ $parent_cat->id }}'>{{ $parent_cat->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price -->
                    <div class="form-group col-md-6">
                        <label for="price" class="col-form-label">Price (NRS) <span class="text-danger">*</span></label>
                        <input id="price" type="number" name="price" placeholder="Enter price"
                            value="{{ old('price') }}" class="form-control">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Discount -->
                    <div class="form-group col-md-6">
                        <label for="discount" class="col-form-label">Discount (%)</label>
                        <input id="discount" type="number" name="discount" min="0" max="100"
                            placeholder="Enter discount" value="{{ old('discount') }}" class="form-control">
                        @error('discount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Size -->
                    <div class="form-group col-md-6">
                        <label for="size">Size</label>
                        <select name="size[]" class="form-control selectpicker" multiple data-live-search="true">
                            <option value="">--Select any size--</option>
                            <option value="S">Small (S)</option>
                            <option value="M">Medium (M)</option>
                            <option value="L">Large (L)</option>
                            <option value="XL">Extra Large (XL)</option>
                        </select>
                    </div>

                    <!-- Brand -->
                    <div class="form-group col-md-6">
                        <label for="brand_id">Brand</label>
                        <select name="brand_id" class="form-control">
                            <option value="">--Select Brand--</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Condition -->
                    <div class="form-group col-md-6">
                        <label for="condition">Condition</label>
                        <select name="condition" class="form-control">
                            <option value="">--Select Condition--</option>
                            <option value="default">Default</option>
                            <option value="new">New</option>
                            <option value="hot">Hot</option>
                        </select>
                    </div>

                    <!-- Stock -->
                    <div class="form-group col-md-6">
                        <label for="stock">Quantity <span class="text-danger">*</span></label>
                        <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"
                            value="{{ old('stock') }}" class="form-control">
                        @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Photo -->
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

                    <!-- Buttons -->
                    <div class="form-group col-md-12 mb-3">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </div>
            </form> --}}

            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
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

                    <!-- Summary -->
                    <div class="form-group col-md-6">
                        <label for="summary" class="col-form-label">Summary <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="summary" name="summary">{{ old('summary') }}</textarea>
                        @error('summary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-group col-md-12">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Is Featured -->
                    <div class="form-group col-md-6">
                        <label for="is_featured">Is Featured</label><br>
                        <input type="checkbox" name="is_featured" id="is_featured" value="1"
                            {{ old('is_featured') ? 'checked' : '' }}> Yes
                    </div>

                    <!-- Category -->
                    <div class="form-group col-md-6">
                        <label for="cat_id">Category <span class="text-danger">*</span></label>
                        <select name="cat_id" id="cat_id" class="form-control">
                            <option value="">--Select any category--</option>
                            @foreach ($categories as $cat_data)
                                <option value="{{ $cat_data->id }}" {{ old('cat_id') == $cat_data->id ? 'selected' : '' }}>
                                    {{ $cat_data->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('cat_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="form-group col-md-6">
                        <label for="price" class="col-form-label">Price (NRS) <span class="text-danger">*</span></label>
                        <input id="price" type="number" name="price" placeholder="Enter price"
                            value="{{ old('price') }}" class="form-control">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Discount -->
                    <div class="form-group col-md-6">
                        <label for="discount" class="col-form-label">Discount (%)</label>
                        <input id="discount" type="number" name="discount" min="0" max="100"
                            placeholder="Enter discount" value="{{ old('discount') }}" class="form-control">
                        @error('discount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Size -->
                    <div class="form-group col-md-6">
                        <label for="size">Size</label>
                        <select name="size[]" class="form-control selectpicker" multiple data-live-search="true">
                            <option value="">--Select any size--</option>
                            <option value="S" {{ collect(old('size'))->contains('S') ? 'selected' : '' }}>Small (S)
                            </option>
                            <option value="M" {{ collect(old('size'))->contains('M') ? 'selected' : '' }}>Medium (M)
                            </option>
                            <option value="L" {{ collect(old('size'))->contains('L') ? 'selected' : '' }}>Large (L)
                            </option>
                            <option value="XL" {{ collect(old('size'))->contains('XL') ? 'selected' : '' }}>Extra Large
                                (XL)</option>
                        </select>
                    </div>

                    <!-- Brand -->
                    <div class="form-group col-md-6">
                        <label for="brand_id">Brand</label>
                        <select name="brand_id" class="form-control">
                            <option value="">--Select Brand--</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Condition -->
                    <div class="form-group col-md-6">
                        <label for="condition">Condition</label>
                        <select name="condition" class="form-control">
                            <option value="">--Select Condition--</option>
                            <option value="default" {{ old('condition') == 'default' ? 'selected' : '' }}>Default</option>
                            <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>New</option>
                            <option value="hot" {{ old('condition') == 'hot' ? 'selected' : '' }}>Hot</option>
                        </select>
                    </div>

                    <!-- Stock -->
                    <div class="form-group col-md-6">
                        <label for="stock">Quantity <span class="text-danger">*</span></label>
                        <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"
                            value="{{ old('stock') }}" class="form-control">
                        @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Photo -->
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

                    <!-- Status -->
                    <div class="form-group col-md-6">
                        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="form-group col-md-12 mb-3">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        // $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 100
            });
        });

        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write detail description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>

    <script>
        $('#cat_id').change(function() {
            var cat_id = $(this).val();
            if (cat_id != null) {
                // Ajax call
                $.ajax({
                    url: "/admin/category/" + cat_id + "/child",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: cat_id
                    },
                    type: "POST",
                    success: function(response) {
                        if (typeof(response) != 'object') {
                            response = $.parseJSON(response)
                        }
                        var html_option = "<option value=''>----Select sub category----</option>"
                        if (response.status) {
                            var data = response.data;
                            if (response.data) {
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data, function(id, title) {
                                    html_option += "<option value='" + id + "'>" + title +
                                        "</option>"
                                });
                            } else {}
                        } else {
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    }
                });
            } else {}
        })
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
