@extends('BackEnd.index')
@section('content')
<a href="{{ route('the-loai.CreateForm') }}" class="btn btn-primary">thêm mới</a>
<hr>
@if(session('status'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
          </svg>
          <div>
            <h5> {{session('status')}}!</h5>
          </div>
        </div>
  
        @endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên thể loại</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Slug thể loại</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($theloai as $theloais)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$theloais->ten_the_loai}}</td>
      <td>{{$theloais->mo_ta}}</td>
      <td>{{$theloais->slug_the_loai}}</td>
      <td>
        @if ($theloais->trang_thai==0)
            <span class="text text-danger">Ẩn</span>
        @else
            <span class="text text-success">Hiển thị</span>
        @endif
    
      </td>
      <td>
        <a href="{{ route('the-loai.delete', ['id'=>$theloais->id]) }}" onclick="confirm('Are you sure you want to delete this')">Xoá</a>
        <a href="{{ route('the-loai.EditForm', ['id'=>$theloais->id]) }}">Sửa</a>
      </td>
     </tr>
    @endforeach
   
  </tbody>
</table>
@endsection