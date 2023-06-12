@extends('layouts.admin')
@section('title')
List Users
@endsection
@section('create')
    <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#create-data">Add User</button>
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
                            <th>User</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Avatar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->role_id }}</td>
                            <td>{{ $item->avatar }}</td>                            
                            <td>
                                <button type="button" class="btn-sm btn-primary" data-id="{{ $item->id }}"
                                    data-toggle="modal" data-target="#update-data">Edit</button>
                                <form id="deleteForm{{ $item->id }}" action="/product-del-{{ $item->id }}"
                                    class="d-inline" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="delproduct" name="delproduct" value=""
                                        class="btn-sm btn-danger"
                                        onclick="confirmDelete(event,{{ $item->id }},'{{ $item->name }}')">Del</button>
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