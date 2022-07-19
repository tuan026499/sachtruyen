@extends('BackEnd.index')
@section('content')
<div class="col-md-6 ">
  <div class="card card-primary">
    <form class="col-md-12"  method="POST" enctype="multipart/form-data" >
      @csrf
        <div class="card-body">
        <div class="form-group">
        <label for="inputDescription">Tiêu Đề</label>
        <input name="tieu_de"  id="slug" value="{{old('tieu_de',$chapters->tieu_de)}}" onkeyup="ChangeToSlug()" class="form-control" rows="5">
        @error('tieu_de')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputProjectLeader">Slug chapter</label>
          <input type="text" name="slug_chapter"  id="convert_slug" value="{{old('slug_chapter',$chapters->slug_chapter)}}"class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="inputStatus">Thuộc truyện</label>
            
            <select  id="inputStatus"type="text" value="{{old('truyen_id')}}" name="truyen_id"  class="form-control custom-select">
              {{-- @foreach ($truyen as $item)
                    <option value="{{$item->id}}" {{$chapter->truyen_id == $item->id ? 'selected' : '' }} >{{$item->tieu_de}}</option>
                @endforeach --}}
                <option value="{{$chapters->truyen->id}}" {{$chapters->truyen->truyen_id == $chapters->truyen->id ? 'selected' : '' }} >{{$chapters->truyen->tieu_de}}</option>

            </select>
            @error('truyen_id')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
        <div class="form-group">
        <label for="inputSpentBudget">Nội dung</label>
        <textarea type="text" id="noidung_editor" name="noi_dung" style="height: 110px" class="form-control" size="5">{{old('noi_dung',$chapters->noi_dung)}}</textarea>
        @error('noi_dung')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputStatus">Trạng thái</label>
          <select id="inputStatus" class="form-control custom-select" value="{{old('trang_thai')}}" name="trang_thai">
            <option value="">----Chọn trạng thái</option>
            <option value="0" @if(old('trang_thai',$chapters->trang_thai)=='0'){{'selected'}}@endif>Ẩn</option>
            <option value="1" @if(old('trang_thai',$chapters->trang_thai)=='1'){{'selected'}}@endif>Hiện</option>
          </select>
          @error('trang_thai')
          <div class="text-danger">{{$message}}</div>
          @enderror
          </div>
      </div>
      <!-- /.card-body -->
  </div>
</div>
  <!-- /.card -->

</div>

</div>
<div class="row">
  <div class="col-12">
    <a href="{{ route('chapter.show',[$truyen->slug_truyen,$chapters->slug_chapter]) }}" class="btn btn-secondary">Cancel</a>
    {{-- <a href="{{ route('chapter.show',[$chapters->truyen->slug_truyen]) }}" class="btn btn-secondary">Cancel</a> --}}
    <button  class="btn btn-success float-center">Create new Porject</button> 
  </div>
</div>

</form>
@endsection