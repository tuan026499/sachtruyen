@extends('page.user.profile')
@section('title', 'home')
@section('profile')
<div>
    <nav aria-label="breadcrumb" style="margin-top: 5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('trang-chu') }}">Home</a></li>
            <li class="breadcrumb-item " aria-current="page">
                <a href="">Thông tin chung</a>
            </li>
        </ol>
    </nav>
  </div>
<h6>YOUR PROFILE INFORMATION</h6>
@if (session('status'))
    <div class="alert alert-success alert-success">

        <a class="panel-close close" data-dismiss="alert">×</a>

        <i class="fa fa-coffee"></i>
        @if (session('status'))
            <strong>{{ session('status') }}!</strong>
        @endif
    </div>
@endif
<hr>
    <input type="hidden" value="{{ Auth::user()->id }}" >
    <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" class="form-control" id="full_name" name="full_name" aria-describedby="fullNameHelp"
            placeholder="Enter your fullname" value="{{ Auth::user()->full_name }}" readonly>
        <small id="fullNameHelp" class="form-text text-muted">Your name may appear
            around here where you are mentioned. You can change or remove it at any
            time.</small>
    </div>
    <div class="form-group">
        <label for="location">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your location"
            value="{{ Auth::user()->email }}" readonly>
    </div>
    <div class="form-group small text-muted">
        Your email can't change
    </div>
     --}}
{{-- <button class="btn btn-primary save-profile" id="change_password">Update Profile</button> --}}
<a href="{{ route('EditProfile')}}" class="btn btn-primary"> Update Profile</a>
@endsection
