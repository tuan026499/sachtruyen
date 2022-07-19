@extends('BackEnd.index')
@section('content')
<div class="col-md-12 " style="margin: auto">
  <div class="card card-primary">
    <form class="col-md-12" method="POST"  enctype="multipart/form-data" >
      {{ csrf_field() }}
        <div class="card-body">
        <div class="form-group">
        <label for="inputDescription">Tên danh mục</label>
        <input  name="ten_danh_muc"  id="slug" value="{{old('ten_danh_muc',$danhmuc->ten_danh_muc)}}" onkeyup="ChangeToSlug()" class="form-control" rows="5">
        @error('ten_danh_muc')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputProjectLeader">Slug </label>
          <input type="text" name="slug_danh_muc"  id="convert_slug" value="{{old('slug_danh_muc',$danhmuc->slug_danh_muc)}}"class="form-control" readonly>
         <p class="font-monospace danger">*Slug sẽ được tự động thêm</p>
        </div>
        <div class="form-group">
        <label for="inputSpentBudget">Mô tả</label>
        <textarea type="text"  name="mo_ta" style="height: 110px" class="form-control" size="5">{{old('mo_ta',$danhmuc->mo_ta)}}</textarea>
        @error('mo_ta')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputStatus">Trạng thái</label>
          <select id="inputStatus" class="form-control custom-select" value="{{old('trang_thai',$danhmuc->mo_ta)}}" name="trang_thai">
            <option value="">----Chọn trạng thái</option>
            <option value="0" {{($danhmuc->trang_thai==0) ? 'selected':''}}>Ẩn</option>
            <option value="1" {{($danhmuc->trang_thai==1) ? 'selected':''}}>Hiện</option>
          </select>
          @error('trang_thai')
          <div class="text-danger">{{$message}}</div>
          @enderror
          </div>
          </form>
          <div class="col-12">
            <a href="{{route('danhmuc.index')}}" class="btn btn-secondary" style="float: right">Cancel</a>
            <button  class="btn btn-success float-center" style="float: left">Save</button> 
          </div>
      </div>
</div>
@endsection