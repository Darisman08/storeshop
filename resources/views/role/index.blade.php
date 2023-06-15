@extends('layouts.admin')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Role</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dash">Home</a></li>
                <li class="breadcrumb-item active">Role</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
@section('content')
    <div id="data-table" class="card">
        <div class="card-body"><br>
        <a href="/role-create" class="btn btn-primary btn-sm bi bi-plus-square mb-3"> Add</a>
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
                        <th>Role</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $item)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a class="btn btn-success btn-sm bi bi-pencil-square" href="/role-edit-{{ $item->id }}"> Edit</a>
                                <form action="/role-del-{{ $item->id }}" class="d-inline" type="submit" >                                                                       
                                    <button class="btn btn-danger btn-sm bi bi-trash" onclick="return confirm('Yakin Role {{ $item->name }} diHapus?')">Del</button>
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
