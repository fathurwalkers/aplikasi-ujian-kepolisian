<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>
    <script src="{{ asset('assets/wheeldecide') }}/Winwheel.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/wheeldecide') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom fonts for this template -->
    <link href="{{ asset('assets/wheeldecide') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/wheeldecide') }}/css/agency.min.css" rel="stylesheet" />
</head>

@stack('css')

<body id="page-top">
    <section class="color" style="padding: 10px 0">
        @yield('main-content')
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/wheeldecide') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/wheeldecide') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('assets/wheeldecide') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="{{ asset('assets/wheeldecide') }}/js/jqBootstrapValidation.js"></script>
    <script src="{{ asset('assets/wheeldecide') }}/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('assets/wheeldecide') }}/js/agency.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

    @stack('js')
</body>

</html>
