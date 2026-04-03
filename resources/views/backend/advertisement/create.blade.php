@extends('backend.layouts.master')
@section('title', 'Add Advertisement')
@section('main-content')

    <div class="card">
        <h5 class="card-header">Add Advertisement</h5>
        <div class="card-body">
            <form method="post" action="{{ route('advertisement.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                        value="{{ old('title') }}" class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputDescription" class="col-form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo"
                            value="{{ old('photo') }}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputLinkUrl" class="col-form-label">Link URL</label>
                    <input id="inputLinkUrl" type="url" name="link_url" placeholder="Enter link URL"
                        value="{{ old('link_url') }}" class="form-control">
                    @error('link_url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputTargetAudience" class="col-form-label">Target Audience</label>
                    <input id="inputTargetAudience" type="text" name="target_audience"
                        placeholder="e.g., All users, Premium users" value="{{ old('target_audience') }}"
                        class="form-control">
                    @error('target_audience')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputPosition" class="col-form-label">Position <span class="text-danger">*</span></label>
                    <select name="position" class="form-control">
                        <option value="">--Select Position--</option>
                        <option value="homepage" {{ old('position') == 'homepage' ? 'selected' : '' }}>Homepage</option>
                        <option value="sidebar" {{ old('position') == 'sidebar' ? 'selected' : '' }}>Sidebar</option>
                        <option value="popup" {{ old('position') == 'popup' ? 'selected' : '' }}>Popup</option>
                        <option value="header" {{ old('position') == 'header' ? 'selected' : '' }}>Header</option>
                        <option value="footer" {{ old('position') == 'footer' ? 'selected' : '' }}>Footer</option>
                        <option value="product_page" {{ old('position') == 'product_page' ? 'selected' : '' }}>Product Page
                        </option>
                        <option value="category_page" {{ old('position') == 'category_page' ? 'selected' : '' }}>Category
                            Page</option>
                    </select>
                    @error('position')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputAdType" class="col-form-label">Ad Type <span class="text-danger">*</span></label>
                    <select name="ad_type" class="form-control">
                        <option value="">--Select Ad Type--</option>
                        <option value="banner" {{ old('ad_type') == 'banner' ? 'selected' : '' }}>Banner</option>
                        <option value="popup" {{ old('ad_type') == 'popup' ? 'selected' : '' }}>Popup</option>
                        <option value="sidebar" {{ old('ad_type') == 'sidebar' ? 'selected' : '' }}>Sidebar</option>
                        <option value="video" {{ old('ad_type') == 'video' ? 'selected' : '' }}>Video</option>
                        <option value="text" {{ old('ad_type') == 'text' ? 'selected' : '' }}>Text</option>
                    </select>
                    @error('ad_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputStartDate" class="col-form-label">Start Date</label>
                    <input id="inputStartDate" type="datetime-local" name="start_date" value="{{ old('start_date') }}"
                        class="form-control">
                    @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputEndDate" class="col-form-label">End Date</label>
                    <input id="inputEndDate" type="datetime-local" name="end_date" value="{{ old('end_date') }}"
                        class="form-control">
                    @error('end_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputBudget" class="col-form-label">Budget ($)</label>
                    <input id="inputBudget" type="number" name="budget" placeholder="Enter budget"
                        value="{{ old('budget') }}" step="0.01" min="0" class="form-control">
                    @error('budget')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputCostPerClick" class="col-form-label">Cost Per Click ($)</label>
                    <input id="inputCostPerClick" type="number" name="cost_per_click"
                        placeholder="Enter cost per click" value="{{ old('cost_per_click', 0) }}" step="0.0001"
                        min="0" class="form-control">
                    @error('cost_per_click')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputCostPerView" class="col-form-label">Cost Per View ($)</label>
                    <input id="inputCostPerView" type="number" name="cost_per_view" placeholder="Enter cost per view"
                        value="{{ old('cost_per_view', 0) }}" step="0.0001" min="0" class="form-control">
                    @error('cost_per_view')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputPriority" class="col-form-label">Priority</label>
                    <input id="inputPriority" type="number" name="priority"
                        placeholder="Enter priority (higher number = higher priority)" value="{{ old('priority', 0) }}"
                        min="0" class="form-control">
                    @error('priority')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputStatus" class="col-form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="">--Select Status--</option>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_featured" id="inputIsFeatured"
                            value="1" {{ old('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label" for="inputIsFeatured">
                            Featured Advertisement
                        </label>
                    </div>
                </div>

                <!-- Coin Rewards Section -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Coin Rewards Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCoinsPerView" class="col-form-label">Coins Per View</label>
                            <input id="inputCoinsPerView" type="number" name="coins_per_view"
                                placeholder="Enter coins awarded per view" value="{{ old('coins_per_view', 0) }}"
                                min="0" class="form-control">
                            <small class="form-text text-muted">Number of coins awarded to users for viewing this
                                advertisement</small>
                            @error('coins_per_view')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputCoinsPerClick" class="col-form-label">Coins Per Click</label>
                            <input id="inputCoinsPerClick" type="number" name="coins_per_click"
                                placeholder="Enter coins awarded per click" value="{{ old('coins_per_click', 0) }}"
                                min="0" class="form-control">
                            <small class="form-text text-muted">Number of coins awarded to users for clicking this
                                advertisement</small>
                            @error('coins_per_click')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputMaxCoinsPerUser" class="col-form-label">Max Coins Per User</label>
                            <input id="inputMaxCoinsPerUser" type="number" name="max_coins_per_user"
                                placeholder="Enter maximum coins per user (optional)"
                                value="{{ old('max_coins_per_user') }}" min="0" class="form-control">
                            <small class="form-text text-muted">Maximum coins a single user can earn from this
                                advertisement (leave empty for no limit)</small>
                            @error('max_coins_per_user')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputTotalCoinsBudget" class="col-form-label">Total Coins Budget</label>
                            <input id="inputTotalCoinsBudget" type="number" name="total_coins_budget"
                                placeholder="Enter total coins budget (optional)" value="{{ old('total_coins_budget') }}"
                                min="0" class="form-control">
                            <small class="form-text text-muted">Total coins budget for this advertisement (leave empty for
                                no limit)</small>
                            @error('total_coins_budget')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote-lite.css') }}">
@endpush

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote-lite.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush
