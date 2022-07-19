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
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('failed')}}
        </div>
    @endif
        <div class="card-header">
            <h3>Đăng kí</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form">
                @csrf
                <!-- Email input -->
                <div class="row">
                    <div class="col-md-3" style="padding:5px;text-align:center;">
                        <label class="form-label" for="form2Example1">Tên đăng nhập</label>
                    </div>
                    <div class="col-md-5" style="float: right;">
                        <input type="text" name="username" id="form2Example1" class="form-control" value="{{old('username')}}"/>
                    </div>
                    @error('username')
                    <div class="col-md-4">
                        <span id="passwordHelpInline" class="form-text text-danger">
                            {{$message}}
                        </span>
                      </div>
                      @enderror
                </div>
                <!-- Password input -->
                <div class="row">
                    <div class="col-md-3" style="padding:5px;text-align:center;">
                        <label class="form-label" for="form2Example2">Email</label>
                    </div>
                    <div class="col-md-5">
                        <input type="email" name="email" id="form2Example2" class="form-control" value="{{old('email')}}"/>
                    </div>
                    @error('email')
                    <div class="col-md-4">
                        <span id="passwordHelpInline" class="form-text text-danger">
                            {{$message}}
                        </span>
                      </div>
                      @enderror
                </div>
                <div class="row">
                  <div class="col-md-3" style="padding:5px;text-align:center;">
                      <label class="form-label" for="form2Example2">Họ và Tên</label>
                  </div>
                  <div class="col-md-5">
                      <input type="text" name="full_name" id="form2Example2" value="{{old('full_name')}}" class="form-control" />
                  </div>
                  @error('full_name')
                  <div class="col-md-4">
                      <span id="passwordHelpInline" class="form-text text-danger">
                          {{$message}}
                      </span>
                    </div>
                    @enderror
              </div>
              <div class="row">
                <div class="col-md-3" style="padding:5px;text-align:center;">
                    <label class="form-label" for="form2Example2">Password</label>
                </div>
                <div class="col-md-5">
                    <input type="password" name="password" id="form2Example2" class="form-control" value="{{old('password')}}" />
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
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                      </div>
                    </div>

                </div>
                <!-- Register buttons -->
                <div class="text-center">
                    <p>Already have an account?  <a href="{{ route('dang-nhap') }}">Đăng nhập</a></p>
                <button type="submit" class="btn btn-primary" style="margin: auto">Đăng kí</button>
                    
                </div>
            </form>
        </div>
    </div>
@endsection
