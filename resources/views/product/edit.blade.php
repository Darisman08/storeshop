@extends('layouts.admin')

@section('pagetitle')
<div class="pagetitle">
    <h1>Edit Product</h1>
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
    <form class="row g-3" method="post" action="/product-update" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="col-md-4">
            <label for="name" class="form-label">Product Name</label>
            <input type="hidden" id="id" name="id" value="{{ $products->id }}">
            <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$products->name) }}" required autofocus>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price',$products->price) }}" required>
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="cat_id" class="form-label">Category</label>
            <select class="form-select @error('category') is-invalid @enderror" name="cat_id" id="cat_id">
                @foreach ($categories as $category)
                @if (old('cat_id',$products->cat_id)==$category->id)
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
            <input type="hidden" name="oldImage" value="{{ $products->image }}">
            @if($products->image)
            <img src="{{ asset('storage/' . $products->image) }}" class="img-preview img-fluid mb-3 d-block" id="frame" style="max-height: 150px; overflow:hidden">
            @else                
            <img  class="img-preview img-fluid mb-3 d-block" id="frame" style="max-height: 150px; overflow:hidden">
            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                name="image" onchange="preview()">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-8">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description',$products->description) }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary col-md-2">Submit</button>
    </form>
</div>
@endsection