@extends('layouts.admin')

@section('pagetitle')
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dash">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
@section('content')
    <div id="data-table" class="card">
        <div class="card-body"><br>
        <a href="/user-create" class="btn btn-primary btn-sm bi bi-plus-square mb-3"> Add</a>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
           {{ session('success') }}
          </div>          
        @endif
            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Position</th>
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
                            <td>{{ $item->position }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->role_name }}</td>
                            <td><img src="{{ asset('storage/' . $item->image) }}" width="50" height="50"></td>
                            <td>
                                <a class="btn btn-success btn-sm bi bi-pencil-square" href="/user-edit-{{ $item->id }}"> Edit</a>
                                <form action="/user-del-{{ $item->id }}" class="d-inline" type="submit" >                                                                       
                                    <button class="btn btn-danger btn-sm bi bi-trash" onclick="return confirm('Yakin User {{ $item->name }} diHapus?')">Del</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <!-- End Table with stripped rows -->

            
        </div>
    </div>

@endsection
