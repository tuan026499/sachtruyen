<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href={{ asset('admin/img/apple-icon.png')}}>
    <link rel="icon" type="image/png" href={{ asset('admin/img/favicon.ico')}}>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- CSS Files -->
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href={{ asset('admin/css/bootstrap.min.css')}} rel="stylesheet" />
    <link href={{ asset('admin/css/light-bootstrap-dashboard.css')}} rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
</head>

<body>
    <div class="wrapper">
        @include('BackEnd.Layouts.sidebar')
        <div class="main-panel">
            <!-- Navbar -->
            @include('BackEnd.Layouts.navbar')
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="section">
                        @yield('content')
                    </div>
                </div>
            </div>
            
            
        </div>
        @include('BackEnd.Layouts.footer')
    </div>
    <!--   -->

</body>
<!--   Core JS Files   -->
@include('BackEnd.Layouts.script')

</html>
