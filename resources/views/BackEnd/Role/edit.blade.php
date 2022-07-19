@extends('BackEnd.index')
@section('content')
<div class="col-md-12 " style="margin: auto">
  <div class="card card-primary">
    <form class="col-md-12" action=""  method="POST" enctype="multipart/form-data" >
      @csrf
        <div class="card-body">
        <div class="form-group">
        <label for="inputDescription">Tên role</label>
        <input  name="role_name"  value="{{old('role_name',$role->role_name)}}" class="form-control" rows="5">
        @error('role_name')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
        </div>
          
          <div class="col-12">
            <a href="{{route('role.index')}}" class="btn btn-secondary" style="float: right">Cancel</a>
            <button  class="btn btn-success float-center" style="float: left">Create new Role</button> 
          </div>
        </form>
      </div>
</div>
@endsection