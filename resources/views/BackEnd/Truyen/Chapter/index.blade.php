@extends('BackEnd.index')
@section('content')
<div class="col-12">
  <div class="card">
    <a href="{{ route('chapter.create', ['slug'=>$truyen->slug_truyen]) }}" class="btn btn-primary">Thêm mới</a>
    <div class="card-header">
      <h3 class="card-title">Danh mục</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
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
      <table id="example2" class="table table table-hover">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên chapter</th>
            <th>Chapter number</th>
            <th>Slug chapter</th>
            <th>Thời gian thêm</th>
            <th>Trạng thái</th>
            <th>Acction</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($chapters as $chapter) <!-- foreach chapter -->
         <tr>          
            <td>{{$loop->index}}</td>
            <td>{{$chapter->chapter_name}}</td>
            <td>{{$chapter->chapter_number}}</td>
            <td>{{$chapter->slug_chapter}}</td>
            <td>{{$chapter->created_at->diffForHumans()}}</td>
            <td>
              @if ($chapter->status == 0)
                  <span class="text text-danger">Ẩn</span>
              @else
                  <span class="text text-success">Hiện</span>
              @endif
          </td>
             <td>
            <a href="{{ route('chapter.update',['slug'=>$truyen->slug_truyen,'slug_chapter'=>$chapter->slug_chapter]) }}" class="btn btn-primary"> Sửa</a>
            <a href="{{ route('show', ['slug'=>$truyen->slug_truyen,'slug_chapter'=>$chapter->slug_chapter]) }}" class="btn btn-outline-dark">chi tiet</a>
            <a href="{{ route('chapter.delete', ['slug'=>$truyen->slug_truyen,'slug_chapter'=>$chapter->slug_chapter]) }}" onclick="return confirm('Bạn chắc chắn muốn xoá?')" class="btn btn-danger">Xoá</a>
            </td>     
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
{{ $chapters->links() }}

@endsection