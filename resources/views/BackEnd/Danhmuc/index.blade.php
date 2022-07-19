@extends('BackEnd.index')
@section('content')
<a href="{{ route('danhmuc.createForm') }}" class="btn btn-primary">thêm mới</a>
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
      <th scope="col">Slug</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($danhmuc as $item)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$item->ten_danh_muc}}</td>
      <td>{{$item->mo_ta}}</td>
      <td>{{$item->slug_danh_muc}}</td>
      <td>
        @if ($item->trang_thai==0)
            <span class="text text-danger">Ẩn</span>
        @else
            <span class="text text-success">Hiển thị</span>
        @endif
    
      </td>
      <td>
        <a href="{{ route('danhmuc.delete', ['id'=>$item->id]) }}" onclick="confirm('Are you sure you want to delete this')">Xoá</a>
        <a href="{{ route('danhmuc.edit', ['id'=>$item->id]) }}">Sửa</a>
      </td>
     </tr>
    @endforeach
   
  </tbody>
</table>
@endsection