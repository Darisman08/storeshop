@extends('layouts.admin')
@section('title')
    Approval
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
                                <th>Product</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->cat_name }}</td>
                                    <td><img src="{{ asset('storage/' . $item->image) }}" width="150" height="150"></td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->sta_name }}</td>
                                    <td>
                                        <button type="button" class="btn-sm btn-primary" data-id="{{ $item->id }}"
                                            data-toggle="modal" data-target="#update-data">Approve</button>
                                        <form id="deleteForm{{ $item->id }}" action="/product-del-{{ $item->id }}"
                                            class="d-inline" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="delproduct" name="delproduct" value=""
                                                class="btn-sm btn-danger"
                                                onclick="confirmDelete(event,{{ $item->id }},'{{ $item->name }}')">Rejected</button>
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
