@extends('layouts.admin')

@section('pagetitle')
<div class="pagetitle">
    <h1>Edit User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dash">Home</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
@endsection
@section('content')
<div>
    <form class="row g-3" method="post" action="/user-update" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="col-md-4">
            <label for="name" class="form-label">Full Name</label>
            <input type="hidden" id="id" name="id" value="{{ $users->id }}">
            <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$users->name) }}" required autofocus>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',$users->email) }}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="role_id" class="form-label">Role</label>
            <select class="form-select @error('role') is-invalid @enderror" name="role_id" id="role_id">
                @foreach ($roles as $role)
                @if (old('role_id',$users->role_id)==$role->id)
                <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                @else
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endif
                @endforeach
                @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
        </div>
        <div class="col-md-4">
            <label for="image" class="form-label">Avatar</label>
            <input type="hidden" name="oldImage" value="{{ $users->image }}">
            @if($users->image)
            <img src="{{ asset('storage/' . $users->image) }}" class="img-preview img-fluid mb-3 d-block" id="frame" style="max-height: 150px; overflow:hidden">
            @else                
            <img  class="img-preview img-fluid mb-3 d-block" id="frame" style="max-height: 150px; overflow:hidden">
            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                name="image" onchange="preview()">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="position" class="form-label">Position</label>
            <input type="position" class="form-control @error('position') is-invalid @enderror" id="position"
                name="position" value="{{ $users->position }}" required>
            @error('position')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="5" required>{{ old('address',$users->address) }}</textarea>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary col-md-2">Submit</button>
    </form>
</div>
@endsection