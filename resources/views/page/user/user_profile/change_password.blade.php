@extends('FrontEndLayouts.master')
@section('title', 'home')
@section('content')
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('success') }}
            </div>
        @elseif(Session::has('failed'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('failed') }}
            </div>
        @endif
<div class="card align-self-center" style="background-color:#1f1f1f;text-center">
    <h2  class="text-light title-New-Uploads" style="padding:10px;text-align: center;">
        <svg xmlns="http://www.w3.org/2000/svg" 
            width="25" 
            height="25" 
            fill="red" 
            class="bi bi-heart-fill" 
            viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
        </svg>
      CHANGED PASSWORD
    </h2>
    <div class="alert alert-danger text-center" role="alert">
       Nếu bạn muốn thay đổi mật khẩu, hãy nhập mật khẩu cũ và mật khẩu mới!
      </div>
<div class="card-body align-self-center" style="min-width:500px;">
    <form method="POST" action="{{ route('save.change_password') }}" style="max-width:500px">
        @csrf
        <div class="form-group text-center">
            <label class="d-block">Change Password</label>
            <input type="password" class="form-control" name="current_password" placeholder="Mật khẩu cũ">
            @error('current_password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <input type="password" class="form-control mt-1" name="new_password" placeholder="Mật khẩu mới">
            @error('new_password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <input type="password" class="form-control mt-1" name="confirm_password" placeholder="Nhập lại mật khẩu mới">
            @error('confirm_password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary save-profile" id="change_password">Update Password</button>
        <a href="{{ route('profile') }}" class="btn btn-danger">Cancel</a>
    </form>
</div>
</div>
   

    <hr>
    
    <hr>
@endsection
