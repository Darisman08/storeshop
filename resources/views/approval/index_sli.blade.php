@extends('layouts.admin')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Slide</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dash">Home</a></li>
                <li class="breadcrumb-item active">Slide</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
@section('content')
    <div id="data-table" class="card">
        <div class="card-body"><br>
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
                        <th>Slide</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slides as $item)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->sta_name }}</td>
                            <td><img src="{{ asset('storage/' . $item->image) }}" width="100" height="50">
                            </td>
                            <td>
                                <form action="/approve-sli-update" class="d-inline" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                                    <input type="hidden" id="status_id" name="status_id" value="1">                                                                       
                                    <button class="btn btn-success btn-sm" onclick="return confirm('Yakin Slide {{ $item->name }} disetujui?')"><i class="bi bi-check-square"></i></button>
                                </form>
                                <form action="/approve-sli-update" class="d-inline" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                                    <input type="hidden" id="status_id" name="status_id" value="2">                                                                       
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Slide {{ $item->name }} ditolak?')"><i class="bi bi-x-square"></i></button>
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
