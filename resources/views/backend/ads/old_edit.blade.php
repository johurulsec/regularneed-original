@extends('backend.layouts.master')

@section('title', 'E-commerce || Ad Edit')

@section('main-content')

    <div class="card">
        <h5 class="card-header">Edit Ad</h5>
        <div class="card-body">
            <form method="post" action="{{ route('ads.update', $ad->id) }}">
                @csrf
                @method('PATCH')

                {{-- Title --}}
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                        value="{{ old('title', $ad->title) }}" class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <label for="inputDescription" class="col-form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description', $ad->description) }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Image --}}
                <div class="form-group">
                    <label for="inputPhoto" class="col-form-label">Image</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="image"
                            value="{{ old('image', $ad->image) }}">
                    </div>
                    <div id="holder" style="margin-top:15px; max-height:100px;">
                        @if ($ad->image)
                            <img src="{{ asset($ad->image) }}" alt="Ad Image" style="height: 5rem;">
                        @endif
                    </div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Link --}}
                <div class="form-group">
                    <label for="inputLink" class="col-form-label">Link URL</label>
                    <input id="inputLink" type="url" name="link" placeholder="https://example.com"
                        value="{{ old('link', $ad->link) }}" class="form-control">
                    @error('link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Target Audience --}}
                <div class="form-group">
                    <label for="inputTargetAudience" class="col-form-label">Target Audience</label>
                    <select id="inputTargetAudience" name="target_audience" class="form-control">
                        <option value="">Select target audience...</option>
                        @foreach ([
            'all' => 'All Audiences',
            '13-17' => 'Teens (13-17)',
            '18-24' => 'Young Adults (18-24)',
            '25-34' => 'Millennials (25-34)',
            '35-44' => 'Adults (35-44)',
            '45-54' => 'Middle-Aged (45-54)',
            '55+' => 'Seniors (55+)',
        ] as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('target_audience', $ad->target_audience) == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('target_audience')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Position --}}
                <div class="form-group">
                    <label for="inputPosition" class="col-form-label">Position</label>
                    <select id="inputPosition" name="position" class="form-control">
                        <option value="">Select ad position...</option>
                        <optgroup label="Standard Positions">
                            <option value="top" {{ old('position', $ad->position) == 'top' ? 'selected' : '' }}>Top
                                Banner</option>
                            <option value="sidebar" {{ old('position', $ad->position) == 'sidebar' ? 'selected' : '' }}>
                                Sidebar</option>
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
                                {{ old('position', $ad->position) == 'in_content' ? 'selected' : '' }}>In-Content</option>
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

                {{-- Start Date --}}
                <div class="form-group col-md-4">
                    <label for="inputStartDate" class="col-form-label">Start Date</label>
                    <input id="inputStartDate" type="datetime-local" name="start_date"
                        value="{{ old('start_date', optional($ad->start_date)->format('Y-m-d\TH:i:s')) }}"
                        class="form-control">
                    @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- End Date --}}
                <div class="form-group col-md-4">
                    <label for="inputEndDate" class="col-form-label">End Date</label>
                    <input id="inputEndDate" type="datetime-local" name="end_date"
                        value="{{ old('end_date', optional($ad->end_date)->format('Y-m-d\TH:i:s')) }}"
                        class="form-control">
                    @error('end_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="form-group">
                    <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="active" {{ old('status', $ad->status) == 'active' ? 'selected' : '' }}>Active
                        </option>
                        <option value="inactive" {{ old('status', $ad->status) == 'inactive' ? 'selected' : '' }}>Inactive
                        </option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Featured Checkbox --}}
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_featured" id="inputIsFeatured"
                            value="1" {{ old('is_featured', $ad->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="inputIsFeatured">
                            Featured Advertisement
                        </label>
                    </div>
                </div>

                {{-- Coin Rewards Section --}}
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Coin Rewards Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCoinsPerView" class="col-form-label">Coins Per View</label>
                            <input id="inputCoinsPerView" type="number" name="coins_per_view"
                                placeholder="Enter coins awarded per view"
                                value="{{ old('coins_per_view', $ad->coins_per_view ?? 0) }}" min="0"
                                class="form-control">
                            <small class="form-text text-muted">Number of coins awarded to users for viewing this
                                advertisement</small>
                            @error('coins_per_view')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputCoinsPerClick" class="col-form-label">Coins Per Click</label>
                            <input id="inputCoinsPerClick" type="number" name="coins_per_click"
                                placeholder="Enter coins awarded per click"
                                value="{{ old('coins_per_click', $ad->coins_per_click ?? 0) }}" min="0"
                                class="form-control">
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
                                value="{{ old('max_coins_per_user', $ad->max_coins_per_user) }}" min="0"
                                class="form-control">
                            <small class="form-text text-muted">Maximum coins a single user can earn from this
                                advertisement (leave empty for no limit)</small>
                            @error('max_coins_per_user')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputTotalCoinsBudget" class="col-form-label">Total Coins Budget</label>
                            <input id="inputTotalCoinsBudget" type="number" name="total_coins_budget"
                                placeholder="Enter total coins budget (optional)"
                                value="{{ old('total_coins_budget', $ad->total_coins_budget) }}" min="0"
                                class="form-control">
                            <small class="form-text text-muted">Total coins budget for this advertisement (leave empty for
                                no limit)</small>
                            @error('total_coins_budget')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Submit --}}
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
