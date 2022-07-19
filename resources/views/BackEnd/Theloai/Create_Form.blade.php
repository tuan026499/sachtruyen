@extends('BackEnd.index')
@section('content')
<div class="col-md-12 " style="margin: auto">
  <div class="card card-primary">
    <form class="col-md-12"  method="POST" enctype="multipart/form-data" >
      @csrf
        <div class="card-body">
        <div class="form-group">
        <label for="inputDescription">Tên thể loại</label>
        <input  name="ten_the_loai"  id="slug" value="{{old('ten_the_loai')}}" onkeyup="ChangeToSlug()" class="form-control" rows="5">
        @error('ten_the_loai')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputProjectLeader">Slug </label>
          <input type="text" name="slug_the_loai"  id="convert_slug" value="{{old('slug_the_loai')}}"class="form-control" readonly>
         <p class="font-monospace danger">*Slug sẽ được tự động thêm</p>
        </div>
        <div class="form-group">
        <label for="inputSpentBudget">Mô tả</label>
        <textarea type="text" value="" name="mo_ta" style="height: 110px" class="form-control" size="5">{{old('mo_ta')}}</textarea>
        @error('mo_ta')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputStatus">Trạng thái</label>
          <select id="inputStatus" class="form-control custom-select" value="{{old('trang_thai')}}" name="trang_thai">
            <option value="">----Chọn trạng thái</option>
            <option value="0" @if(old('trang_thai')=='0'){{'selected'}}@endif>Ẩn</option>
            <option value="1" @if(old('trang_thai')=='1'){{'selected'}}@endif>Hiện</option>
          </select>
          @error('trang_thai')
          <div class="text-danger">{{$message}}</div>
          @enderror
          </div>
          </form>
          <div class="col-12">
            <a href="{{route('the-loai.index')}}" class="btn btn-secondary" style="float: right">Cancel</a>
            <button  class="btn btn-success float-center" style="float: left">Create new Porject</button> 
          </div>
      </div>
</div>
@endsection