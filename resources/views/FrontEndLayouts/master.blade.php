<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <link rel="stylesheet" href={{ asset('css/owl.carousel.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/background-image.css') }}>
    <link rel="stylesheet" href={{ asset('css/owl.theme.default.min.css') }}>
    <link  rel="stylesheet" href="{{ asset('css/image-uploader.css') }}">
    

</head>

<body>
    @include('frontEndLayouts.navbar')
    <br>
    {{-- <div class='header-background' style="margin-bottom: 20px">
       
    </div> --}}
    <div class="container shadow p p-3 mb-5 bg-body rounded">
    <!----------------------------------------------->
    <!---------------------SLIDE-------------------------->
    {{-- <div class="slide">  --}}
        {{-- @include('page.slide') --}}
    {{-- </div> --}}
       
    <!---------------------END SLIDE---------------------->
    <!---------------------TRUYEN---------------------->
    <div></div>
    <div class="show-truyen">  
         @yield('content')
        </div>
    
    <!---------------------END TRUYEN---------------------->
    
     </div>
    {{-- @include('frontEndLayouts.footer') --}}
    @include('frontEndLayouts.script')
    {{-- @yield('script') --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
@yield('script')

</body>

</html>
