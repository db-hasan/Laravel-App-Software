@extends('backend.layouts')
@section('content')
    <main id="main" class="main pt-0">
        <div class="card">
            <div class="d-flex justify-content-between bg-success-subtle px-4 pt-3">
                <div class="pagetitle">
                    <h1>Create User</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </nav>
                </div>
                <div class="text-end pt-2">
                    <a href="{{ route('user.index') }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i>
                        View
                        User</a>
                </div>
            </div>
            <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data" class="row g-3 p-3">
                @csrf

                <div class="col-md-6 pb-3">
                    <label for="name" class="form-label">User Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        required placeholder="Type your name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6" id="rolesWrapper">
                    <label for="roles" class="form-label">Role<span class="text-danger">*</span></label>
                    <select class="form-select" name="roles" id="roles" required>
                        <option selected disabled>Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 pb-3">
                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        required placeholder="mail@gmail.com">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 pb-3">
                    <label for="number" class="form-label">Number<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="number" name="number" value="{{ old('number') }}"
                        required placeholder="01700 00 00 00">
                    @error('number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 pb-3">
                    <label for="new_password" class="form-label">New Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="new_password" name="new_password" value="" placeholder="Uppercase lowercase number with special character">
                    <span class="text-danger" id="password_suggestion"></span>
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 pb-3">
                    <label for="new_password_confirmation" class="form-label">Confirm Password<span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="new_password_confirmation"
                        name="new_password_confirmation" value="" placeholder="Type confirm Password">
                    @error('new_password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 pb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </main>
@endsection
