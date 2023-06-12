@extends('layouts.admin')
@section('title')
    List Product
@endsection
@section('create')
    <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#create-data">Add Product</button>
@endsection
@section('content')
    <div id="data-table" class="col-xl-12">
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
                                    <td><img src="{{ asset('storage/' . $item->image) }}" width="150" height="150">
                                    </td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->sta_name }}</td>
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



                {{-- Modal Edit Data --}}
                <div id="update-data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-data"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="update-data">Edit Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <form id="edit-data" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="hidden" name="id" id="id" class="form-control">
                                            <input type="hidden" name="status_id" id="status_id" class="form-control">
                                            <label for="name">Product Name</label>
                                            <input type="name" class="form-control" name="name" id="name"
                                                placeholder="Name">
                                            <div id="nameErrors" class="error-container"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control" name="price" id="price"
                                                placeholder="Price">
                                            <div id="priceErrors" class="error-container"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="cat_id">Category</label>
                                            <select id="cat_id" name="cat_id" class="form-control">
                                            </select>
                                            <div id="cat_idErrors" class="error-container"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" id="image"
                                                    name="image">
                                                <label class="custom-file-label" for="inputGroupFile02">Choose File</label>
                                            </div>
                                            <div id="imageErrors" class="error-container"></div>
                                        </div>

                                    </div>
                                    <div class="form-group col_md-6">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                                        <div id="descriptionErrors" class="error-container"></div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn  btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Modal Tambah Data --}}
                <div id="create-data" class="modal" tabindex="-1" role="dialog" aria-labelledby="create-data"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="create-data">Add Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div id="errorMessages"></div>
                            <form id="add-data" action="/product-store" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Product Name</label>
                                            <input type="hidden" class="form-control" name="status_id" value="3">
                                            <input type="name" class="form-control" id="name" name="name"
                                                placeholder="Name" required>
                                            <div id="nameErrorsCreate" class="error-container"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control" id="price" name="price"
                                                placeholder="Price" required>
                                            <div id="priceErrorsCreate" class="error-container"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="cat_id">Category</label>
                                            <select id="cat_id" name="cat_id" class="form-control" required>
                                                <option value="" selected>Select</option>
                                                <option value="1">Software</option>
                                                <option value="2">Souvenir</option>
                                                <option value="3">Food</option>
                                            </select>
                                            <div id="cat_idErrorsCreate" class="error-container"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image"
                                                    name="image">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                    file</label>
                                            </div>
                                            <div id="imageErrorsCreate" class="error-container"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                                        <div id="descriptionErrorsCreate" class="error-container"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn  btn-primary">ADD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <!-- Memuat jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Memuat Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    {{-- Store Data --}}
    <script>
        $(document).ready(function() {
            $('#add-data').submit(function(event) {
                event.preventDefault();

                var form = $(this);
                var url = form.attr('action');
                var method = form.attr('method');
                var formData = new FormData(this);

                // Clear previous error messages
                $('.error-container').empty();

                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#create-data').modal(
                            'hide'); // Menutup modal setelah data berhasil ditambahkan
                        if (response.hasOwnProperty('status') && response.status ===
                            'success') {
                            var successMessage = response.success;
                            $('<div class="alert alert-success col-md-3">' + successMessage +
                                    '</div>')
                                .insertBefore('#data-container');
                        }
                        $('.modal-backdrop').remove();
                        // window.location.href = "/product";
                        $.ajax({
                            url: '/product-table', // Ubah URL sesuai dengan URL endpoint yang menyediakan data tabel
                            method: 'GET',
                            success: function(data) {
                                $('#data-table').replaceWith(
                                    data
                                ); // Mengganti seluruh konten div dengan id "data-container" dengan data tabel baru
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                var errorContainer = $('#' + field + 'ErrorsCreate');
                                $.each(messages, function(index, message) {
                                    errorContainer.append(
                                        '<div class="alert alert-danger">' +
                                        message + '</div>');
                                });
                            });
                        } else {
                            console.log(xhr.responseText);
                        }
                    }
                });
            });
        });
    </script>
    {{-- Del Data --}}
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js "></script>
    <script>
        function confirmDelete(event, id, name) {
            event.preventDefault();


            swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Akan menghapus data Product " + name + "!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("deleteForm" + id).submit();
                }
            });
        }
    </script>
    {{-- Edit Data --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            // load data di modal edit
            $('#update-data').on('show.bs.modal', function(event) {
                // Mengambil data dari button yang diklik, cek data-id
                var button = $(event.relatedTarget);
                var id = button.data('id');
                // Fetch data menggunakan ajax
                $.ajax({
                    type: "GET",
                    url: `/product-edit-${id}`,
                    dataType: "JSON",
                    success: function(response) {
                        $('#id').val(response.data.id);
                        $('#name').val(response.data.name);
                        $('#description').val(response.data.description);
                        $('#price').val(response.data.price);
                        $('#status_id').val(response.data.status_id);
                        $('#image').val(response.data.image);

                        var catName = response.data.cat_name;
                        var catId = response.data.cat_id;
                        $('#cat_id').html('<option  value="' + catId + '">' + catName +
                            '</option><option value="1">Software</option><option value="2">Souvenir</option><option value="3">Food</option>'
                        );
                    }
                });
            });
            // edit data
            $('#edit-data').submit(function(e) {
                e.preventDefault();
                
                $.ajax({
                    type: "PUT",
                    url: "{{ url('/product-update') }}",
                    data: $(this).serialize(),
                    dataType: "json",                    
                    success: function(response) {
                        $('#update-data').modal('hide');
                        $('.modal-backdrop').remove();
                        if (response.hasOwnProperty('status') && response.status ===
                            'success') {
                            var successMessage = response.success;
                            $('<div class="alert alert-success col-md-3">' + successMessage +
                                    '</div>')
                                .insertBefore('#data-container');
                        }
                        $.ajax({
                            url: '/product-table', // Ubah URL sesuai dengan URL endpoint yang menyediakan data tabel
                            method: 'GET',
                            success: function(data) {
                                $('#data-table').replaceWith(
                                    data
                                ); // Mengganti seluruh konten div dengan id "data-container" dengan data tabel baru
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    },

                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                var errorContainer = $('#' + field + 'Errors');
                                $.each(messages, function(index, message) {
                                    errorContainer.append(
                                        '<div class="alert alert-danger">' +
                                        message + '</div>');
                                });
                            });
                        } else {
                            console.log(xhr.responseText);
                        }
                    }
                });
            });
        });
    </script>
@endsection
