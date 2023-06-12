@extends('layouts.admin')
@section('title')
Categories
@endsection
@section('create')
    <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#create-data">Add Category</button>
@endsection
@section('content')
<div class="col-xl-12">
    <div class="card">            
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Product</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $cat->name }}</td>
                            <td>
                                <button type="button" class="btn-sm btn-primary" data-id="{{ $cat->id }}"
                                    data-toggle="modal" data-target="#update-data">Edit</button>
                                <form id="deleteForm{{ $cat->id }}" action="/category-del-{{ $cat->id }}"
                                    class="d-inline" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="delcategory" name="delcategory" value=""
                                        class="btn-sm btn-danger"
                                        onclick="confirmDelete(event,{{ $cat->id }},'{{ $cat->name }}')">Del</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection