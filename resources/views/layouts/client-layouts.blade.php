<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    <!-- plugins:css -->
    @stack('css')

</head>

<body>
    <!-- navbar -->
    <x-client-dashboard-navbar />
    <!-- akhir navbar -->

    <!-- konten -->
    {{-- <div class="container " style="margin-top: 120px; height: 900px;"> --}}
    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">

        <div class="row row-cols-1 justify-content-center mx-auto">
            <div class="col-sm-12 col-md-12 col-lg-12 justify-content-center mx-auto">
                @yield('header-content')
            </div>
        </div>

        @yield('main-content')
    </div>
    <!-- akhir konten -->

    <!-- footer -->
    <x-client-dashboard-footer />
    <!-- akhir footer -->

    <!-- akhir footer -->

    @stack('js')
</body>

</html>
