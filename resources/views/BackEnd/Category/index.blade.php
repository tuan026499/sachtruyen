@extends('BackEnd.index')
@section('content')
<a href="{{ route('category.create') }}" class="btn btn-primary">thêm mới</a>
<hr>
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
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên cate</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Slug </th>
      {{-- <th scope="col">Trạng thái</th> --}}
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($category as $cate)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$cate->cate_name}}</td>
      <td>{{$cate->mo_ta}}</td>
      <td>{{$cate->slug_cate}}</td>
      {{-- <td>
        @if ($cate->trang_thai==0)
            <span class="text text-danger">Ẩn</span>
        @else
            <span class="text text-success">Hiển thị</span>
        @endif
    
      </td> --}}
      <td>
        <a href="{{ route('category.delete', ['slug'=>$cate->slug_cate]) }}" onclick="confirm('Are you sure you want to delete this')">Xoá</a>
        {{-- <a href="{{ route('the-loai.EditForm', ['id'=>$theloais->id]) }}">Sửa</a> --}}
      </td>
     </tr>
    @endforeach
   
  </tbody>
</table>
@endsection