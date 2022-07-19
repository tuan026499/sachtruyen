@extends('BackEnd.index')
@section('content')
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
  <div class="container">
    
    <form class="col-md-12" action=""name="form-example-1" id="form-example-1" method="POST" enctype="multipart/form-data">
      @csrf
     
          <div class="card-body text-primary">
            <div class="card mb-3" style="">
              <div class="form-group" hidden>
                <label for="inputStatus">Thuộc truyện</label>
                <select  id="inputStatus"type="text" value="{{old('truyen_id')}}" name="truyen_id"  class="form-control custom-select" readonly>
                        <option value="{{$truyen->id}}"@if(old('truyen_id',$truyen->id)==$truyen->id){{'selected'}}@endif >{{$truyen->tieu_de}}</option>
                </select>
                @error('truyen_id')
                  <div class="text-danger">{{$message}}</div>
                  @enderror
            </div>
              <div class="row g-0">
                <div class="col-md-2">
                  <img src="{{ asset('storage/' . $truyen->image) }}"  alt="..." width="128" height="150">
                </div>
                <div class="col-md-10">
                  <div class="card-body">
                    <h5 class="card-title" style="font-size:20px;">{{$truyen->tieu_de}}</h5>
                    <p class="card-text">{{$truyen->tac_gia}} 
                      @if($truyen->trang_thai==0)
                    <span class="badge text-bg-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#ed2618" class="bi bi-circle-fill" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                      </svg>
                    drop
                    </span>
                    @elseif($truyen->trang_thai==1)
                    <span class="badge text-bg-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#42f548" class="bi bi-circle-fill" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                      </svg>
                    on going
                    </span>
                    @else
                    <span class="badge text-bg-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="##1894ed" class="bi bi-circle-fill" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                      </svg>
                    complete
                    </span>
                    @endif
                  </p>
                    <p class="card-text"><small class="text-muted">
                      {{$truyen->updated_at->diffForHumans() }}
                    </small></p>
                  </div>
                </div>
              </div>
            </div>
      </div>
        <div class="card-body text-dark">
            <div class="row g-0">
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid" name="chapter_number" value="{{old('chapter_number')}}">
                    <label for="floatingInputGrid">Chapter Number</label>
                    @error('chapter_number')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <div class="form-floating">
                      <input type="text" class="form-control" 
                      id="slug"  onkeyup="ChangeToSlug()" name="chapter_name"
                       value="{{old('chapter_name')}}">
                      <label for="floatingInputGrid">Chapter name</label>
                    </div>
                    @error('chapter_name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" 
                        id="floatingSelect" 
                        aria-label="Floating label select example" 
                        value="{{old('status')}}" 
                        name="status"
                      > 
                      <option value="">Chọn trạng thái</option>
                      <option value="0" @if(old('status')=='0'){{'selected'}}@endif>Ẩn</option>
                      <option value="1" @if(old('status')=='1'){{'selected'}}@endif selected>Hiện</option>
                    </select>
                    <label for="floatingSelect">Trạng thái</label>
                    @error('status')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
            </div>
      </div>
      <div class="card-body text-dark">
        <div class="row g-0">
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" 
                    class="form-control"  
                    id="convert_slug" 
                    value="{{old('slug_chapter')}}" 
                    name="slug_chapter" 
                    readonly="readonly"
                >
                <label for="floatingInputGrid">Slug</label>
                @error('slug_chapter')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
              </div>
            </div>
        </div>
      </div>
      <div class="card-body text-dark ">
        <div class="row g-0">
          <div class="form-group border">
            <label for="inputEstimatedBudget">Ảnh đại diện</label>
            <input type="file" name="chapter_images[]" value="{{ old('chapter_images') }}" class="form-control"
            onchange="loadFile(event)"  multiple="multiple" >
            <img  id="output" width="44%"  style="max-height: 250px;">
           
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        {{-- <button class="btn btn-primary me-md-5 button-create-color" type="submit" >Button</button> --}}
        <button class="btn btn-primary" type="submit">Button</button>
      </div>
    {{-- </div> --}}
    </form>
  {{-- <div class="col-md-6 " style="margin:auto">
    <div class="card card-primary">
      
        @csrf
          <div class="card-body">
          <div class="form-group">
            <label for="inputDescription">Tiêu Đề</label>
            <input name="tieu_de"  id="slug" value="{{old('tieu_de')}}" onkeyup="ChangeToSlug()" class="form-control" rows="5">
            @error('tieu_de')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="inputProjectLeader">Slug chapter</label>
            <input type="text" name="slug_chapter"  id="convert_slug" value="{{old('slug_chapter')}}"class="form-control" readonly>
            @error('slug_chapter')
            <div class="text-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group">
              <label for="inputStatus">Thuộc truyện</label>
              <select  id="inputStatus"type="text" value="{{old('truyen_id')}}" name="truyen_id"  class="form-control custom-select" readonly>
                      <option value="{{$truyen->id}}"@if(old('truyen_id',$truyen->id)==$truyen->id){{'selected'}}@endif >{{$truyen->tieu_de}}</option>
              </select>
              @error('truyen_id')
                <div class="text-danger">{{$message}}</div>
                @enderror
          </div>
          <div class="form-group">
            <label for="inputSpentBudget">Nội dung</label>
            <textarea type="text" id="noidung_editor" name="noi_dung" style="height: 110px" class="form-control" size="5">{{old('noi_dung')}}</textarea>
            @error('noi_dung')
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
        </div>
        <!-- /.card-body -->
    </div>
  </div> --}}
    <!-- /.card -->
  
  </div>
  
  </div>
  {{-- <div class="row">
    <div class="col-12">
      <a href="{{route('chapter.show',['slug' => 'slug_truyen'])}}" class="btn btn-secondary">Cancel</a>
      <button  class="btn btn-success float-center">Create new Porject</button> 
    </div>
  </div> --}}
  
  </form>
  </div>
<script>
  $('.input-images').imageUploader();
</script>
@endsection