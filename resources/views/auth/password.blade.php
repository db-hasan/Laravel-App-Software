@extends('backend/layouts')
@section('content')
    <main id="main" class="main row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body pt-3">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                            width="150">
                        <div class="mt-3">
                            <h4>{{ $users->name }}</h4>
                            <p class="text-secondary mb-1">{{ $users->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="card">
                <h3 class="p-3">Password Update</h3>
                <form method="post" action="" enctype="multipart/form-data" class="row g-3 p-3">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="col-md-12 pb-3">
                        <label for="old_password" class="form-label">Current Password<span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="old_password" name="old_password" value="">
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 pb-3">
                        <label for="new_password" class="form-label">New Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="new_password" name="new_password" value="">
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 pb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm Password<span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="new_password_confirmation"
                            name="new_password_confirmation" value="">
                        @error('new_password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
