<!DOCTYPE html>
<html lang="en">

<head>

    <title>Register</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="admin/assets/images/favicon.icon" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
</head>

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
    <div class="auth-content text-center">
        <a href="/"><img src="admin/assets/images/logo.png" alt="" class="img-fluid mb-4"></a>
        <div class="card borderless">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <h4 class="f-w-400">Register</h4>
                        <form action="/register" method="post">
                            @csrf
                            <hr>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" placeholder="Nama" required value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="Email" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" id="address" placeholder="Alamat" required value="{{ old('address') }}">
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-block mb-4" type="submit">Register</button>
                            <hr>
                        </form>
                        <p class="mb-2">Already have an account? <a href="/login" class="f-w-400">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->
<script src="admin/assets/js/vendor-all.min.js"></script>
<script src="admin/assets/js/plugins/bootstrap.min.js"></script>

<script src="admin/assets/js/pcoded.min.js"></script>



</body>

</html>
