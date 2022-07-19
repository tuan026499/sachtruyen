@extends('FrontEndLayouts.master')
@section('title', 'home')
@section('content')
    <div class="card" style="width: 700px;margin:auto">
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('success')}}
        </div>
    @elseif(Session::has('failed'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('failed')}}
        </div>
    @endif
        <div class="card-header" style="background-color:#1f1f1f">
            <h3 class="text-white">Đăng nhập</h3>
        </div>
        <div class="card-body" style="background-color:#1f1f1f">
            <form action="" method="post" enctype="multipart/form">
                @csrf
                <!-- Email input -->
                <div class="row">
                    <div class="col-md-3" style="padding:5px;text-align:center;">
                        <label class="form-label text-light" for="form2Example1">Tên đăng nhập</label>
                    </div>
                    <div class="col-md-5  text-light" style="float: right;">
                        <input type="text" name="username" id="form2Example1" class="form-control" />
                    </div>
                    @error('username')
                    <div class="col-md-4  ">
                        <span id="passwordHelpInline" class="form-text text-danger">
                            {{$message}}
                        </span>
                      </div>
                      @enderror
                </div>
                <br>
                <!-- Password input -->
                <div class="row">
                    <div class="col-md-3 " style="padding:5px;text-align:center;">
                        <label class="form-label  text-light" for="form2Example2">Password</label>
                    </div>
                    <div class="col-md-5">
                        <input type="password" name="password" id="form2Example2" class="form-control" />
                    </div>
                    @error('password')
                    <div class="col-md-4">
                        <span id="passwordHelpInline" class="form-text text-danger">
                            {{$message}}
                        </span>
                      </div>
                      @enderror
                </div>
                <!-- 2 column grid layout for inline styling -->
                <br>
                <div class="row " style="width:100%">
                    <!-- Simple link -->
                    <div class="col-md-6 ">
                      <div class="form-check" style="padding:5px;float: right;">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label text-light" for="form2Example31"> Remember me </label>
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <p><a href="#!" class="text-light">Forgot password? </a></p>
                    </div>

                </div>
                <!-- Register buttons -->
                <div class="text-center text-light">
                    <p>Not a member? <a href="{{ route('dang-ki') }}">Register</a></p>
                <button type="submit" class="btn btn-primary" style="margin: auto">Sign in</button>
                    
                </div>
            </form>
        </div>
     </div>
@endsection

{{-- <!DOCTYPE html>
<html lang="en" class="bare theme-black" style="background-color: #1f1f1f">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main>
        <div id="content">

        </div>
    </main>
</body>
</html> --}}