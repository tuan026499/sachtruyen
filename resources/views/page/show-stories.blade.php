@extends('FrontEndLayouts.master')
@section('title','home')
@section('content')

<div><h1>Truyện Mới Cập Nhật</h1></div>
<hr>
{{-- <div class="container "style="padding:10px"> --}}
  
{{-- <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3"> --}}
<div class="row ">
  @foreach ($truyen as $item)
<div class="col-md-4">
<div class="image-text" style="width: 10rem">
  <a href="{{ route('doc-truyen', ['slug'=>$item->slug_truyen]) }}">
    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="...">
  </a>
    <div class="content-text"  >
      <a href="{{ route('doc-truyen', ['slug'=>$item->slug_truyen]) }}">
      <p class="text-center text-break font-weight-light text-uppercase" id="text-over"  style="color:white">{{$item->tieu_de}}</p>
      </a>
    </div>
    </div>
  </div>
    @endforeach
  </div>


@endsection 

