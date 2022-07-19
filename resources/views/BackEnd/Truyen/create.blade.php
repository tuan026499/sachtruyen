@extends('BackEnd.index')
@section('content')
<div class="col-md-6" style="float: left; margin">
  <div class="card card-primary">
      <form class="col-md-12" method="POST" enctype="multipart/form-data" >
          @csrf
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
          <div class="card-body">
              <div class="form-group">
                  <label for="inputDescription">Tiêu Đề</label>
                  <input name="tieu_de" id="slug" value="{{ old('tieu_de') }}" onkeyup="ChangeToSlug()"
                      class="form-control" rows="5">
                  @error('tieu_de')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="inputProjectLeader">Slug Truyện</label>
                  <input type="text" name="slug_truyen" id="convert_slug" value="{{ old('slug_truyen') }}"
                      class="form-control" readonly>
              </div>
              <div class="form-group">
                  <label for="inputSpentBudget">Tác Giả</label>
                  <input type="text" value="{{ old('tac_gia') }}" name="tac_gia" class="form-control">
                  @error('tac_gia')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="inputSpentBudget">Mô tả ngắn</label>
                  <textarea type="text" name="mo_ta_ngan" style="height: 110px" class="form-control"
                      size="5">{{ old('mo_ta_ngan') }}</textarea>
                  @error('mo_ta_ngan')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
              {{-- <div class="form-group">
                  <label for="inputStatus">Thuộc danh mục</label>
                  <select id="inputStatus" type="text" value="{{ old('danh_muc_id') }}" name="danh_muc_id"
                      class="form-control custom-select">
                      <option value="" selected>----Thuộc danh mục----</option>
                      @foreach ($danhmuc as $item)
                              @if (old('danh_muc_id')==$item->id)
                              <option value="{{ $item->id }}" selected>{{ $item->ten_danh_muc }}</option>
                              @else
                              <option value="{{ $item->id }}">{{ $item->ten_danh_muc }}</option>
                              @endif
                      @endforeach
                  </select>
                  @error('danh_muc_id')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div> --}}
              <div class="form-group">
                  <label for="inputStatus">Trạng thái</label>
                  <select id="inputStatus" class="form-control custom-select" value="{{ old('trang_thai') }}"
                      name="trang_thai">
                      <option value="">----Chọn trạng thái</option>
                      <option value="0" @if (old('trang_thai') == '0'){{ 'selected' }}@endif class="text text-warning">Ẩn</option>
                      <option value="1" @if (old('trang_thai') == '1'){{ 'selected' }}@endif class="text text-success">Hiện</option>
                  </select>
                  @error('trang_thai')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="inputStatus">Status</label>
                  <select id="inputStatus" class="form-control custom-select" value="{{ old('tinh_trang') }}"
                      name="tinh_trang">
                      <option value=""> ----Chọn tình trạng----</option>
                      <option value="0" @if (old('tinh_trang') == '0'){{ 'selected' }}@endif class="text text-warning">Tạm ngưng</option>
                      <option value="1" @if (old('tinh_trang') == '1'){{ 'selected' }}@endif class="text text-primary">Đang tiến hành</option>
                      <option value="2" @if (old('tinh_trang') == '2'){{ 'selected' }}@endif class="text text-success">Đã hoàn thành</option>
                  </select>
                  @error('tinh_trang')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
          </div>
          <!-- /.card-body -->
  </div>
</div>
<!-- /.card -->
<div class="col-md-6 " style="float: right; margin">
  <div class="card card-secondary">

      <div class="card-body">
          <div class="form-group">
            <label for="inputStatus">Thuộc thể loại</label>
            <select id="inputStatus" type="text" value="{{ old('theloai_id') }}" name="theloai_id"
                class="form-control custom-select">
                <option value="" selected>----Thể loại----</option>
                @foreach ($theloai as $item)
                    @if (old('theloai_id')==$item->id)
                    <option value="{{ $item->id }}" selected>{{ $item->ten_the_loai }}</option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->ten_the_loai }}</option>
                    @endif
                @endforeach
            </select>
            @error('theloai_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group " >
            <label for="inputStatus">Category</label><br>
            @foreach($categories as $category)
            <label class="checkbox-inline col-md-3" style="margin-left:10px">
                <input type="checkbox" 
                name="category_id[]"  
                id="category" 
                value="{{$category->id}}"
                {{(is_array(old('category_id')) and in_array($category->id, old('category_id'))) ? ' checked' : '' }}> 
                {{-- category_id là 1 mảng
                nên check cái phần tử đấy có trong mảng category_id  chưa
                chưa có thì k có gì
                còn có rồi thì checked --}}
                {{$category->cate_name}}
              </label>
            @endforeach
        </div>
        @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="inputEstimatedBudget">Ảnh đại diện</label>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                    onchange="loadFile(event)">
                <img id="output" alt="" width="20%">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
      </div>
  </div>

<!-- /.card-body -->
</div>
<!-- /.card -->
<div class="row">
  <div class="col-12">
      <a href="{{ route('truyen.index') }}" class="btn btn-secondary" onclick="onchange('bạn chắc chắn muốn huỷ?')">Cancel</a>
      <button class="btn btn-success float-center">Create new Porject</button>
  </div>

</div>

</form>
@endsection