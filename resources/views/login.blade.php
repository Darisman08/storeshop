<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>
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
<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content text-center">
        <a href="/"><img src="admin/assets/images/logo.png" alt="" class="img-fluid mb-4"></a>
        <div class="card borderless">
            <div class="row align-items-center ">
                <div class="col-md-12">
                    <div class="card-body">
                        @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if(session()->has('loginError'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('loginError') }}
                        </div>
                        @endif
                        <h4 class="mb-3 f-w-400">Login</h4>
                        <hr>
                        <form action="/login" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email address" autofocus required value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember Me.</label>
                        </div>
                        <button class="btn btn-block btn-primary mb-4" type="submit">Login</button>
                        </form>
                        <hr>
                        <p class="mb-0 text-muted">Don’t have an account? <a href="/register"
                                class="f-w-400">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="admin/assets/js/vendor-all.min.js"></script>
<script src="admin/assets/js/plugins/bootstrap.min.js"></script>

<script src="admin/assets/js/pcoded.min.js"></script>
</body>

</html>
