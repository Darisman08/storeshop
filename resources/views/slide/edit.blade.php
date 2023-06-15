@extends('layouts.admin')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Edit Slide</h1>
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
        <form class="row g-3" method="post" action="/slide-update" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="name" class="form-label">Slide Name</label>
                    <input type="hidden" id="id" name="id" value="{{ $slides->id }}">
                    <input type="name" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $slides->name) }}" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row-mt-3">
                <div class="col-md-4">
                    <label for="image" class="form-label">Slide Image</label>
                    <input type="hidden" name="oldImage" value="{{ $slides->image }}">
                    @if ($slides->image)
                        <img src="{{ asset('storage/' . $slides->image) }}" class="img-preview img-fluid mb-3 d-block"
                            id="frame" style="max-height: 150px; overflow:hidden">
                    @else
                        <img class="img-preview img-fluid mb-3 d-block" id="frame"
                            style="max-height: 150px; overflow:hidden">
                    @endif
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image" onchange="preview()">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row-mt-3">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary col-md-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
