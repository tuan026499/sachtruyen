@extends('FrontEndLayouts.master')
@section('title', 'home')
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('failed'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Session::get('failed') }}
        </div>
    @endif
<div class="card" style="background-color:#1f1f1f">
        <h2  class="text-light title-New-Uploads" style="padding:10px;text-align: center;">
            <svg xmlns="http://www.w3.org/2000/svg" 
                width="25" 
                height="25" 
                fill="red" 
                class="bi bi-heart-fill" 
                viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
            </svg>
          Profile
        </h2>
    <div class="card-body" >
        <form action="{{ route('UpdateProfile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row" >
                <div class="col-xl-4 text-center">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0" style="background-color:#1f1f1f">
                        <div class="card-header text-white">Ảnh đại diện</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            @if (Auth::user()->image)
                                <img src="{{ asset('storage/user_image/' . Auth::user()->image) }}" id="output"
                                    class="avatar img-circle img-thumbnail" alt="avatar">
                            @endif
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}"
                                onchange="loadFile(event)">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <h6>Upload a different photo...</h6>
    
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 text-white">
                    <!-- Account details card-->
                    <div class="card mb-4" style="background-color:#1f1f1f">
                        <div class="card-header">Thông tin cá nhân</div>
                            <div class="card-body">
                            @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Username (how your name will appear to other
                                        users
                                        on the site)</label>
                                    <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username"
                                        value="{{ Auth::user()->username }}" readonly>
    
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Full name (how your name will appear to other
                                        users on the site)</label>
                                    <input class="form-control" id="inputUsername" type="text" name="full_name"
                                        placeholder="Enter your username" value="{{ old('full_name', Auth::user()->full_name) }}">
                                </div>
                                    @error('full_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                    <input class="form-control" id="inputEmailAddress" type="email"
                                        placeholder="Enter your email address" value="{{ Auth::user()->email }}" readonly>
                                </div>
                            <!-- Form Row-->
                            <!-- Save changes button-->
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                    <a href="{{ route('profile') }}" class="btn btn-danger">Cancel</a>
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
