@extends('FrontEndLayouts.master')
@section('title', 'home')
@section('content')

<div class="card" style="background-color:#1f1f1f ">
    <div class="card-body">
        <nav aria-label="breadcrumb" style="margin-top: 5px">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('trang-chu') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="">Truyện</a></li>
                <li class="breadcrumb-item " aria-current="page">
                    <a href="{{ route('xem-truyen', [$truyen->slug_truyen]) }}">{{ $chapter->truyen->tieu_de }}</a>
                </li>
                <li class="breadcrumb-item "> <a href="">{{ $chapter->chapter_name }}</a></li>
            </ol>
        </nav>
      <blockquote class="blockquote mb-0 text-white">
        <p>{{ $chapter->truyen->tieu_de }}</p>
        <footer class="blockquote-footer">Cập nhật lúc: <cite title="Source Title">{{ $chapter->created_at->diffForHumans() }}</cite></footer>
      </blockquote>
      <br>
      <div class="card" style="width: auto;background-color:#bce8f1">
        {{-- <div class="card-body"> --}}
            <p class="card-text text-dark text-center" style="padding:10px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  </svg>
                 Sử dụng mũi tên trái (←) hoặc phải (→) để chuyển chapter</p>
          {{-- </div> --}}
      </div>
    </div>
    
  </div>
    
    {{-- <div class="card-body text-center">
        <h1 class="card-title" style="font-size: 25px">
            <p href="" class="text-white">{{ $chapter->truyen->tieu_de }}</p>
        </h1>

        <a href="">{{ $chapter->chapter_name }}</a>
        <div class="chapter-nav scroll-to-fixed-fixed"
            style="z-index: 1000; top: 0px; margin-left: 0px; width: 700px; left: 80px;">
        </div>
    </div> --}}
    {{-- <div class="sticky-top"> --}}
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color:#1f1f1f ">
        <div class="row justify-content-md-center " style="width:100%;">
            <div class="col col-md-3">
                @if (isset($previous_chapter))
                    <a href="{{ route('doc-chapter', [$truyen->slug_truyen, $previous_chapter]) }}"
                        class="btn btn-primary " style="float: right">Tập trước</a>
                @endif
            </div>
            <div class="col-md-auto">
                <select name="select-chapter" class="custom-select select-chapter " id="select_chapter"
                    onchange="window.location.href=this.value;">
                    @foreach ($all_chapter as $item)
                        <option value="{{ route('doc-chapter', [$truyen->slug_truyen, $item->slug_chapter]) }}"
                            {{ $checkChapterId == $item->id ? 'selected="selected"' : '' }} class="">
                            {{ $item->chapter_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col col-md-3">
                @if ($next_chapter)
                    <a href="{{ route('doc-chapter', [$truyen->slug_truyen, $next_chapter]) }}"
                        class="btn btn-primary">Tập sau</a>
                @endif
            </div>
        </div>
    </nav>
    <br>
    {{-- </div> --}}
    {{-- <div class="" style="width: 100%">
    <div class="form-group" style="margin-left: 350px;width: 600px"> 
      @if (isset($previous_chapter))
       <a href="{{route('doc-chapter',[$truyen->slug_truyen,$previous_chapter])}}" class="btn btn-primary " >Tập trước</a> 
       @endif
       <select name="select-chapter"   class="custom-select select-chapter" style="position: relative;width: 50%" id="select_chapter" >
        @foreach ($all_chapter as $item)
        <option value="{{route('doc-chapter',[$truyen->slug_truyen,$item->slug_chapter])}}">{{$item->tieu_de}}</option>
        @endforeach
      </select> 
      @if ($next_chapter)
       <a href="{{route('doc-chapter',[$truyen->slug_truyen,$next_chapter])}}" class="btn btn-primary" >Tập sau</a> 
      @endif
    </div>
  </div> --}}
    <div class=" noidungchuong " <div class="row mt-4 text-center" style="max-width:100%;height: max-height:100%;">
        <div class="card" style="">
            @foreach ($chapter->chapter_images as $ChapterImage)
                <img class="card-img mx-auto d-block" src="{{ asset('storage/upload/chapter/' . $ChapterImage->image) }}"
                    alt="Card image cap" style="text-align: center">
            @endforeach
        </div>
        <br>
    </div>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 50px">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Bình luận Facebook</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Profile</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="fb-comments" data-href="{{ \URL::current() }}" data-width="100%" data-numposts="10"></div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        {{-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> --}}
    </div>
    </div>


@endsection
