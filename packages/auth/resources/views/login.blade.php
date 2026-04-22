<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>::. {{ config('app.name') }} | Log in .::</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center d-flex flex-column align-items-center">
                <img src="{{ asset('assets/backend/img/logo.jpg') }}" alt="Logo"
                     class="mb-2" style="opacity: 0.9; padding: 5px;">
                <a href="#" class="h1 mb-0"><b>A</b>dmin <b>L</b>ogin</a>
            </div>
            <div class="card-body">
{{--                <p class="login-box-msg">Sign in to start your session</p>--}}

                @include('backend.common.session_message_err')

                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email">

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" name="password" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                    </div>


                <div class="social-auth-links text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-block btn-primary">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </button>
                </div>
                <p class="mb-0 text-center">
                    <a href="{{url('register')}}" class="text-center">Register membership account</a>
                </p>
                </form>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
