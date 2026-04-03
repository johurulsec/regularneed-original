@extends('user.layouts.master')
@section('title', 'Admin Profile')

@section('main-content')

    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="font-weight-bold m-0">Profile</h4>
            <ul class="breadcrumbs mb-0">
                <li><a href="{{ route('admin') }}" style="color:#999">Dashboard</a></li>
                <li><span class="active text-primary">Profile Page</span></li>
            </ul>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Left Column: Profile Info -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            @if($profile->photo)
                                <img class="card-img-top img-fluid rounded-circle mt-4"
                                    style="border-radius:50%;height:80px;width:80px;margin:auto;"
                                    src="{{ asset($profile->photo) }}" alt="profile picture">
                            @else
                                <img class="card-img-top img-fluid rounded-circle mt-4"
                                    style="border-radius:50%;height:80px;width:80px;margin:auto;"
                                    src="{{ asset('backend/img/avatar.png') }}" alt="profile picture">
                            @endif
                        </div>
                        <div class="card-body mt-4 ml-2">
                            <h5 class="card-title text-left">
                                <small><i class="fas fa-user"></i> {{ $profile->name }}</small>
                            </h5>
                            <p class="card-text text-left">
                                <small><i class="fas fa-envelope"></i> {{ $profile->email }}</small>
                            </p>
                            @if (auth()->user()->role == 'admin')
                                <p class="card-text text-left">
                                    <small class="text-muted"><i class="fas fa-hammer"></i> {{ $profile->role }}</small>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right Column: Edit Form -->
                <div class="col-md-8">
                    <form class="border px-4 pt-2 pb-3" method="POST"
                        action="{{ route('user-profile-update', $profile->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}

                        <!-- Name -->
                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Name</label>
                            <input id="inputTitle" type="text" name="name" placeholder="Enter name"
                                value="{{ old('name', $profile->name) }}" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email (disabled) -->
                        <div class="form-group">
                            <label for="inputEmail" class="col-form-label">Email</label>
                            <input id="inputEmail" type="email" name="email" placeholder="Enter email"
                                value="{{ $profile->email }}" class="form-control" disabled>
                        </div>

                        <!-- Photo -->
                        <div class="form-group">
                            <label for="photo" class="form-label">Photo <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">

                            <div id="preview" style="margin-top:15px; max-height:150px;">
                                @if($profile->photo)
                                    <img id="preview-img" src="{{ asset($profile->photo) }}" alt="Preview"
                                        style="max-height:150px;">
                                @else
                                    <img id="preview-img" src="#" alt="Preview" style="max-height:150px; display:none;">
                                @endif
                            </div>

                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @if (auth()->user()->role == 'admin')
                            <!-- Role -->
                            <div class="form-group">
                                <label for="role" class="col-form-label">Role</label>
                                <select name="role" class="form-control">
                                    <option value="">-----Select Role-----</option>
                                    <option value="admin" {{ old('role', $profile->role) == 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="user" {{ old('role', $profile->role) == 'user' ? 'selected' : '' }}>User
                                    </option>
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

<style>
    .breadcrumbs {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .breadcrumbs li {
        float: left;
        margin-right: 10px;
    }

    .breadcrumbs li a:hover {
        text-decoration: none;
    }

    .breadcrumbs li .active {
        color: red;
    }

    .breadcrumbs li+li:before {
        content: "/\00a0";
    }

    .image {
        background: url('{{ asset('backend/img/background.jpg') }}');
        height: 150px;
        background-position: center;
        background-size: cover;
        position: relative;
    }

    .image img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    i {
        font-size: 14px;
        padding-right: 8px;
    }
</style>

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
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
@endpush