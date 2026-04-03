@extends('backend.layouts.master')

@section('title', 'E-commerce || Edit Ad')

@section('main-content')

    <div class="card">
        <h5 class="card-header">Edit Ad - {{ $ad->title }}</h5>
        <div class="card-body">
            <form method="post" action="{{ route('ads.update', $ad->id) }}">
                @csrf
                @method('PATCH')

                <!-- Title -->
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                        value="{{ old('title', $ad->title) }}" class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="inputDescription" class="col-form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description', $ad->description) }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label for="inputPhoto" class="col-form-label">Image <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="image"
                            value="{{ old('image', $ad->image) }}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;">
                        @if ($ad->image)
                            <img src="{{ $ad->image }}" style="height: 5rem;">
                        @endif
                    </div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Link -->
                <div class="form-group">
                    <label for="inputLink" class="col-form-label">Link URL</label>
                    <input id="inputLink" type="url" name="link" placeholder="https://example.com"
                        value="{{ old('link', $ad->link) }}" class="form-control">
                    @error('link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Target Audience -->
                <div class="form-group">
                    <label for="inputTargetAudience" class="col-form-label">Target Audience</label>
                    <select id="inputTargetAudience" name="target_audience" class="form-control">
                        <option value="">Select target audience...</option>
                        <option value="all"
                            {{ old('target_audience', $ad->target_audience) == 'all' ? 'selected' : '' }}>All Audiences
                        </option>
                        <option value="13-17"
                            {{ old('target_audience', $ad->target_audience) == '13-17' ? 'selected' : '' }}>Teens (13-17)
                        </option>
                        <option value="18-24"
                            {{ old('target_audience', $ad->target_audience) == '18-24' ? 'selected' : '' }}>Young Adults
                            (18-24)</option>
                        <option value="25-34"
                            {{ old('target_audience', $ad->target_audience) == '25-34' ? 'selected' : '' }}>Millennials
                            (25-34)</option>
                        <option value="35-44"
                            {{ old('target_audience', $ad->target_audience) == '35-44' ? 'selected' : '' }}>Adults (35-44)
                        </option>
                        <option value="45-54"
                            {{ old('target_audience', $ad->target_audience) == '45-54' ? 'selected' : '' }}>Middle-Aged
                            (45-54)</option>
                        <option value="55+"
                            {{ old('target_audience', $ad->target_audience) == '55+' ? 'selected' : '' }}>Seniors (55+)
                        </option>
                    </select>
                    @error('target_audience')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Position and Status side by side -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPosition" class="col-form-label">Position</label>
                        <select id="inputPosition" name="position" class="form-control">
                            <option value="">Select ad position...</option>
                            <optgroup label="Standard Positions">
                                <option value="top" {{ old('position', $ad->position) == 'top' ? 'selected' : '' }}>Top
                                    Banner</option>
                                <option value="sidebar"
                                    {{ old('position', $ad->position) == 'sidebar' ? 'selected' : '' }}>Sidebar</option>
                                <option value="header" {{ old('position', $ad->position) == 'header' ? 'selected' : '' }}>
                                    Header</option>
                                <option value="footer" {{ old('position', $ad->position) == 'footer' ? 'selected' : '' }}>
                                    Footer</option>
                            </optgroup>
                            <optgroup label="Special Positions">
                                <option value="popup" {{ old('position', $ad->position) == 'popup' ? 'selected' : '' }}>
                                    Popup/Modal</option>
                                <option value="sticky" {{ old('position', $ad->position) == 'sticky' ? 'selected' : '' }}>
                                    Sticky Bar</option>
                                <option value="in_content"
                                    {{ old('position', $ad->position) == 'in_content' ? 'selected' : '' }}>In-Content
                                </option>
                            </optgroup>
                            <optgroup label="Mobile Positions">
                                <option value="mobile_interstitial"
                                    {{ old('position', $ad->position) == 'mobile_interstitial' ? 'selected' : '' }}>
                                    Interstitial</option>
                                <option value="mobile_rewarded"
                                    {{ old('position', $ad->position) == 'mobile_rewarded' ? 'selected' : '' }}>Rewarded Ad
                                </option>
                            </optgroup>
                        </select>
                        @error('position')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-group col-md-6">
                        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="active" {{ old('status', $ad->status) == 'active' ? 'selected' : '' }}>Active
                            </option>
                            <option value="inactive" {{ old('status', $ad->status) == 'inactive' ? 'selected' : '' }}>
                                Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Start Date and End Date -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputStartDate" class="col-form-label">Start Date</label>
                        <input id="inputStartDate" type="datetime-local" name="start_date"
                            value="{{ old('start_date', \Carbon\Carbon::parse($ad->start_date)->format('Y-m-d\TH:i:s')) }}"
                            class="form-control">
                        @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputEndDate" class="col-form-label">End Date</label>
                        <input id="inputEndDate" type="datetime-local" name="end_date"
                            value="{{ old('end_date', \Carbon\Carbon::parse($ad->end_date)->format('Y-m-d\TH:i:s')) }}"
                            class="form-control">
                        @error('end_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Featured checkbox and Coin Rewards collapse -->
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" name="is_featured" id="inputIsFeatured"
                        value="1" {{ old('is_featured', $ad->is_featured) ? 'checked' : '' }} data-toggle="collapse"
                        data-target="#coinRewardsCollapse"
                        aria-expanded="{{ old('is_featured', $ad->is_featured) ? 'true' : 'false' }}"
                        aria-controls="coinRewardsCollapse">
                    <label class="form-check-label" for="inputIsFeatured">
                        Featured Advertisement ?
                    </label>
                </div>

                <div class="collapse {{ old('is_featured', $ad->is_featured) ? 'show' : '' }}" id="coinRewardsCollapse">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h5 class="mb-0">Coin Rewards Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="coins_per_view_subscriber">Coins Per View (Subscriber)</label>
                                    <input type="number" name="coins_per_view_subscriber" id="coins_per_view_subscriber"
                                        value="{{ old('coins_per_view_subscriber', $ad->coins_per_view_subscriber ?? 0) }}"
                                        min="0" class="form-control">
                                    @error('coins_per_view_subscriber')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="coins_per_click_subscriber">Coins Per Click (Subscriber)</label>
                                    <input type="number" name="coins_per_click_subscriber"
                                        id="coins_per_click_subscriber"
                                        value="{{ old('coins_per_click_subscriber', $ad->coins_per_click_subscriber ?? 0) }}"
                                        min="0" class="form-control">
                                    @error('coins_per_click_subscriber')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="coins_per_view_non_subscriber">Coins Per View (Non-Subscriber)</label>
                                    <input type="number" name="coins_per_view_non_subscriber"
                                        id="coins_per_view_non_subscriber"
                                        value="{{ old('coins_per_view_non_subscriber', $ad->coins_per_view_non_subscriber ?? 0) }}"
                                        min="0" class="form-control">
                                    @error('coins_per_view_non_subscriber')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="coins_per_click_non_subscriber">Coins Per Click (Non-Subscriber)</label>
                                    <input type="number" name="coins_per_click_non_subscriber"
                                        id="coins_per_click_non_subscriber"
                                        value="{{ old('coins_per_click_non_subscriber', $ad->coins_per_click_non_subscriber ?? 0) }}"
                                        min="0" class="form-control">
                                    @error('coins_per_click_non_subscriber')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="max_coins_per_user">Max Coins Per User</label>
                                    <input type="number" name="max_coins_per_user" id="max_coins_per_user"
                                        value="{{ old('max_coins_per_user', $ad->max_coins_per_user) }}" min="0"
                                        class="form-control">
                                    @error('max_coins_per_user')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="total_coins_budget">Total Coins Budget</label>
                                    <input type="number" name="total_coins_budget" id="total_coins_budget"
                                        value="{{ old('total_coins_budget', $ad->total_coins_budget) }}" min="0"
                                        class="form-control">
                                    @error('total_coins_budget')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit buttons -->
                <div class="form-group mb-3 mt-3">
                    <button type="reset" class="btn btn-warning">Reset</button>
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
        $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write ad description here...",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush
