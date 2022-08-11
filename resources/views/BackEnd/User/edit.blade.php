@extends('BackEnd.index')
@section('content')
<div class="col-md-12 " style="margin: auto">
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
  <div class="card card-primary">
    <form class="col-md-12" method="POST" action=""  enctype="multipart/form-data" >
      {{ csrf_field() }}
        <div class="card-body">
        <div class="form-group">
        <label for="inputDescription">Tên Username</label>
        <input  name="username"  value="{{old('username',$users->username)}}"  class="form-control" rows="5" >
        @error('username')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputDescription">Full Name</label>
          <input  name="full_name"  value="{{old('ten_danh_muc',$users->full_name)}}"  class="form-control" rows="5">
          @error('full_name')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="inputDescription">Email</label>
            <input  name="email" value="{{old('email',$users->email)}}" class="form-control" rows="5">
            @error('email')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
        <div class="form-group">
          <label for="inputStatus">Quyền hạn</label>
          {{-- <select id="inputStatus" class="form-control custom-select" value="{{old('role',$users->role)}}" name="role "> --}}
            <select class="form-control custom-select" data-style="select-with-transition" value="{{old('role',$users->role)}}" name="role" data-size="7">
              <option >----Chọn trạng thái</option>
              <option value="0" {{($users->role==0) ? 'selected':''}}>Khách</option>
              <option value="1" {{($users->role==1) ? 'selected':''}}>Admin</option>
              <option value="2" {{($users->role==2) ? 'selected':''}}>Uploader</option>
          </select>
          @error('role')
          <div class="text-danger">{{$message}}</div>
          @enderror
          </div>
          </form>
          <div class="col-12">
            <a href="{{route('user.index')}}" class="btn btn-secondary" style="float: right">Cancel</a>
            <button  class="btn btn-success float-center" style="float: left">Save</button> 
          </div>
      </div>
</div>
@endsection