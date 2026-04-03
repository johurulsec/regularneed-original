@extends('backend.layouts.master')
@section('main-content')
    <div class="card">
        <h5 class="card-header">Add Subscription</h5>
        <div class="card-body">
            <form method="post" action="{{ route('subscription.store') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputUserId" class="col-form-label">User <span class="text-danger">*</span></label>
                            <select name="user_id" class="form-control">
                                <option value="">--Select User--</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputPlanId" class="col-form-label">Plan <span class="text-danger">*</span></label>
                            <select id="inputPlanId" name="plan_id" class="form-control">
                                <option value="">--Select Plan--</option>
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}" {{ old('plan_id') == $plan->id ? 'selected' : '' }}>
                                        {{ $plan->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('plan_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputPrice" class="col-form-label">Subscription Price<span
                                    class="text-danger">*</span></label>
                            <input id="inputPrice" type="number" step="0.01" name="price" value="{{ old('price') }}"
                                class="form-control">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputStatus" class="col-form-label">Status <span
                                    class="text-danger">*</span></label>
                            <select name="status" class="form-control">
                                <option value="">--Select Status--</option>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="expired" {{ old('status') == 'expired' ? 'selected' : '' }}>Expired</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                                </option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputStartDate" class="col-form-label">Start Date <span
                                    class="text-danger">*</span></label>
                            <input id="inputStartDate" type="datetime-local" name="start_date"
                                value="{{ old('start_date', now()->format('Y-m-d\TH:i:s')) }}" class="form-control">
                            @error('start_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputEndDate" class="col-form-label">End Date <span
                                    class="text-danger">*</span></label>
                            <input id="inputEndDate" type="datetime-local" name="end_date"
                                value="{{ old('end_date', now()->addMonth()->format('Y-m-d\TH:i:s')) }}"
                                class="form-control">
                            @error('end_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="auto_renew" id="inputAutoRenew"
                                value="1" {{ old('auto_renew') ? 'checked' : '' }}>
                            <label class="form-check-label" for="inputAutoRenew">
                                Auto Renew
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 mt-3">
                    <button class="btn btn-success" type="submit">Submit</button>
                    <a href="{{ route('subscription.index') }}" class="btn btn-secondary">Cancel</a>
                </div>

            </form>
        </div>
    </div>
@endsection
