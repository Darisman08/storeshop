@extends('layouts.admin')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Add Role</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dash">Home</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
@section('content')
    <div>
        <form class="row g-3" method="post" action="/role-store" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="name" class="form-label">Role Name</label>
                    <input type="name" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="5" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row-mt-3">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary col-md-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
