<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('assets/ruangadmin') }}/img/logo/logo.png" rel="icon">
    <title>RuangAdmin - Login</title>
    <link href="{{ asset('assets/ruangadmin') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/ruangadmin') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/ruangadmin') }}/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            @if (session('status'))
                                                <div class="alert alert-success">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mx-auto d-flex justify-content-center mb-2">
                                        <div
                                            class="col-sm-12 col-md-12 col-lg-12 mx-auto d-flex justify-content-center">
                                            <img src="{{ asset('assets') }}/logo-trc.jpeg" alt=""
                                                width="200px">
                                        </div>
                                    </div>
                                    <form class="user" action="{{ route('post-login') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="cekrequest" value="admin">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter username"
                                                name="login_username" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="exampleInputPassword"
                                                placeholder="Password" name="login_password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small"
                                                style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                        {{-- <a href="{{ asset('assets/ruangadmin') }}/index.html"
                                            class="btn btn-google btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="{{ asset('assets/ruangadmin') }}/index.html"
                                            class="btn btn-facebook btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> --}}
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="font-weight-bold small" href="{{ route('register') }}">Buat Akun</a>
                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="{{ asset('assets/ruangadmin') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/ruangadmin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/ruangadmin') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('assets/ruangadmin') }}/js/ruang-admin.min.js"></script>
</body>

</html>
