@extends('BackEnd.index')
@section('content')
<div class="col-md-6 "style="float:left">
  <div class="card card-primary">
    <form class="col-md-12"  method="POST" enctype="multipart/form-data" >
      @csrf

      <div class="card-body">
      <div class="form-group">
        <label for="inputDescription">Tiêu Đề</label>
        <input name="tieu_de"  id="slug" value="{{old('tieu_de',$truyen->tieu_de)}}" onkeyup="ChangeToSlug()" class="form-control" rows="5">
        @error('tieu_de')
          <div class="text-danger">{{$message}}</div>
          @enderror
      </div>
      <div class="form-group">
        <label for="inputProjectLeader">Slug Truyện</label>
        <input type="text" name="slug_truyen"  id="convert_slug" value="{{old('slug_truyen',$truyen->slug_truyen)}}"class="form-control" readonly>
      </div>
      <div class="form-group">
        <label for="inputSpentBudget">Tác Giả</label>
        <input type="text" value="{{old('tac_gia',$truyen->tac_gia)}}" name="tac_gia"  class="form-control" >
        @error('tac_gia')
          <div class="text-danger">{{$message}}</div>
          @enderror
      </div>
      <div class="form-group">
        <label for="inputSpentBudget">Mô tả ngắn</label>
        <textarea type="text" id="noidung_editor" value="{{old('mo_ta_ngan')}}" name="mo_ta_ngan" style="height: 110px" class="form-control" size="5">{{$truyen->mo_ta_ngan}}</textarea>
        @error('mo_ta_ngan')
          <div class="text-danger">{{$message}}</div>
          @enderror
      </div>
      
      <div class="form-group">
        <label for="inputStatus">Thuộc danh mục</label>
        <select  id="inputStatus"type="text" value="{{old('danh_muc_id')}}" name="danh_muc_id"  class="form-control custom-select">
            @foreach ($danhmuc as $item)
                <option value="{{$item->id}}"{{$truyen->danh_muc_id == $item->id ?'selected' : ''}} >{{$item->ten_danh_muc}}</option>
            @endforeach
        </select>
        @error('danh_muc_id')
          <div class="text-danger">{{$message}}</div>
          @enderror
      </div>
        <div class="form-group">
          <label for="inputStatus">Trạng thái</label>
          <select id="inputStatus" class="form-control custom-select" value="{{old('trang_thai')}}" name="trang_thai">
            <option value="0"  {{($truyen->trang_thai==0)? 'selected' : ''}}>Ẩn</option>
            <option value="1" {{($truyen->trang_thai==1)? 'selected' : ''}} >Hiện</option>
          </select>
        </div>
        
          <div class="form-group">
            <label for="inputStatus">Status</label>
            <select id="inputStatus" class="form-control custom-select" value="{{old('tinh_trang')}}" name="tinh_trang">
              <option value="0" {{($truyen->tinh_trang==0) ? 'selected' : ''}}>Tạm ngưng</option>
              <option value="1" {{($truyen->tinh_trang==1) ? 'selected' : ''}} >Đang tiến hành</option>
              <option value="2" {{($truyen->tinh_trang==2) ? 'selected' : ''}}>Đã hoàn thành</option>
            </select>
          </div>
          
      </div>
      <!-- /.card-body -->
  </div>
  
  <!-- /.card -->
</div>
<div class="col-md-6" style="float: right">
  <div class="card card-secondary">

    <div class="card-body">
      <div class="form-group">
        <label for="inputEstimatedBudget">Ảnh đại diện</label>
        <input type="file" name="image" value="{{$truyen->image}}" class="form-control" onchange="loadFile(event)">
        <img id="output" src="{{asset('storage/'.$truyen->image)}}" width="50%">
        {{-- <img  alt="" width="55.5%"> --}}
        @error('image')
          <div class="text-danger">{{$message}}</div>
          @enderror
      </div>
      
    </div>
    <div class="form-group " >
      <label for="inputStatus"  style="margin-left: 14px">Category</label>
      <br>
      @foreach($categories as $category)
      <label class="checkbox-inline col-md-3" style="margin-left:10px">
          <input type="checkbox" name="category_id[]" id="category"
           {{($truyen->category_truyen->contains('id',$category->id)) ? 'checked' : '' }} 
           {{-- chỗ này $truyen->category_truyen là lấy ra các category thuộc truyện này
            cái hàm contais là kiểm tra xem có thằng nào == 
            id ở đây là id của category vì lúc này $truyen->category_truyen là đã lấy ra category
            contains kiểm tra id của $truyen->category_truyen == $category->id đang trong lặp k
            nếu có thì thêm attr checked k có thì ""
            
          --}}
          value="{{ $category->id}}"> 
          
          {{$category->cate_name}}
        </label>
        @endforeach
  </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
</div>
<div class="row">
  <div class="col-12">
    <a href="{{route('truyen.index')}}" class="btn btn-secondary">Cancel</a>
    <button  class="btn btn-success float-center">Create new Porject</button> 
  </div>
</div>

</form>
@endsection
