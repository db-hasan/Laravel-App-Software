@extends('backend.layouts')
@section('content')
    <main id="main" class="main pt-0">
        <div class="card">
            <div class="d-flex justify-content-between bg-success-subtle px-4 pt-3">
                <div class="pagetitle">
                    <h1>Update User</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </nav>
                </div>
                <div class="text-end pt-2">
                    <a href="{{ route('user.index') }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i>
                        View
                        user</a>
                </div>
            </div>
            <form method="post" action="{{ route('user.update', $loginuser->id) }}" enctype="multipart/form-data"
                class="row g-3 p-3">
                @csrf
                @method('PUT')

                <div class="col-md-12">
                    <label class="form-label">Role<span class="text-danger">*</span></label>
                    @if (!empty($loginuser->getRoleNames()))
                        @foreach ($loginuser->getRoleNames() as $name)
                            <div class="px-2 py-2 bg-primary-subtle">{{ $name }}</div>
                        @endforeach
                    @endif
                </div>

                <div class="col-md-4 pb-3">
                    <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $loginuser->name }}"
                        required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4 pb-3">
                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $loginuser->email }}"
                        required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4 pb-3">
                    <label for="number" class="form-label">Number<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="number" name="number"
                        value="{{ $loginuser->number }}" required>
                    @error('number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                
                <div class="col-md-4">
                    <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="Default select example" name="status" id="status">
                        <option value="1" {{ $loginuser->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $loginuser->status == 2 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                
                <div class="col-md-4 pb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password">
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 pb-3">
                    <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="new_password_confirmation"
                        name="new_password_confirmation">
                    @error('new_password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 pb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 p-3 ps-5">
                    @if ($loginuser)
                        <div class="mt-3">
                            <img src="/images/{{ $loginuser->image }}" alt="Image not found"
                                style="height: 250px; width: 200px;"
                                class="rounded border border-2 border-dark">
                        </div>
                    @else
                        <div>No data available</div>
                    @endif
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>

    </main>
@endsection
