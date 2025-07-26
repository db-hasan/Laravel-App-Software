@extends('backend/layouts')
@section('content')
    <main id="main" class="main pt-0">
        <div class="card">
            <div class="d-flex justify-content-between bg-success-subtle px-4 pt-3">
                <div class="pagetitle">
                    <h1>New Role Create</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </nav>
                </div>
                <div class="text-end pt-2">
                    <a href="{{ route('role.index') }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i>
                        View
                        Role</a>
                </div>
            </div>
            <form method="post" action="{{ route('role.store') }}" enctype="multipart/form-data" class="row g-3 p-3">
                @csrf

                <div class="col-md-12 pb-3">
                    <label for="name" class="form-label">Role Name<span class="text-danger">*</span></label>
                        <select class="form-select" name="name">
                            <option selected disabled>Select Role</option>
                            @foreach ($rolenames as $rolename)
                                <option value="{{ $rolename->name }}">{{ $rolename->name }}</option>
                            @endforeach
                        </select>                    
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <label class="form-label">Select Permission<span class="text-danger">*</span></label>
                <div class="d-flex flex-wrap mt-0">
                    @foreach($permissions as $permission)
                        <div class="form-check me-3 mb-2">
                            <input class="form-check-input" id="check{{ $permission->id }}" value="{{ $permission->name }}" name="permission[]" type="checkbox">
                            <label class="form-check-label" for="check{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('permission')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            
        </div>
        
    </main>
@endsection
