@extends('layouts.admin')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Add Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dash">Home</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
@section('content')
    <div >
        <form class="row g-3" method="post" action="/product-store" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4">
                <label for="name" class="form-label">Product Name</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}"  required autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price') }}" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="cat_id" class="form-label">Category</label>
                <select class="form-select @error('category') is-invalid @enderror" name="cat_id" id="cat_id">
                    @foreach ($categories as $category)
                        @if (old('cat_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </select>
            </div>
            <div class="col-md-4">
                <label for="image" class="form-label">Product Image</label>
                <img src="" class="img-preview img-fluid mb-3 d-block" id="frame"
                    style="max-height: 180px; overflow:hidden">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="preview()">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-8">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="5" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary col-md-2">Submit</button>
        </form>
    </div>
    
@endsection
