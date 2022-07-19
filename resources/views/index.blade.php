@extends('FrontEndLayouts.master')
@section('title', 'home')
@section('content')

    <hr>
    <div class="card" style="background-color:#1f1f1f">
      <h2  class="text-light title-New-Uploads" style="padding:10px;text-align: center;">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-folder2-open" viewBox="0 0 16 16">
          <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z"/>
        </svg>
        New Uploads</h2>
      <div class="card-body">
        <div class="row ">
          <div class="col-md">
              <div class="row row-cols-5">
                  @foreach ($truyen as $item)
                      <div class="col" style="float:left;widows: 250px;height:310px;">
                          <div class="image-text">
                              <a href="{{ route('xem-truyen', ['slug' => $item->slug_truyen]) }}">
                                  <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="..." style="width:100%">
                              </a>
                              <div class="content-text">
                                  <a href="{{ route('xem-truyen', ['slug' => $item->slug_truyen]) }}">
                                      <p class="text-center text-break font-weight-light text-uppercase" id="text-over"
                                          style="color:white">{{ substr($item->tieu_de,0,30 ) }}</p>
                                  </a>
                              </div>
                          </div>
                      </div>
                      @endforeach
              </div>
          </div>
      </div>
      </div>
    </div>
    {{$truyen->links('vendor.pagination.default') }}
    {{-- <div class="col-md-4 border">
          <h2 style="padding:10px">Truyện theo dõi</h2>
          <hr>
          @if(Auth::check())
            @foreach ($user->favorite_comic->sortBy('created_at') as $userTruyen)

            <div class="card mb-3" style="max-width: 540px">
                <div class="row g-0" style="height: 100px;">
                  <div class="col-md-3" style="height:100px">
                    <a href="{{ route('xem-truyen', [ $userTruyen->slug_truyen]) }}">
                        <img src="{{ asset('storage/' . $userTruyen->image) }}"  class="img-fluid rounded-start" style="margin:auto" >
                        </a>
                  </div>
                  <div class="col-md-8" style="height:100px">
                    <div class="card-body">
                      <h5 class="card-title">
                        <a href="{{ route('xem-truyen', [ $userTruyen->slug_truyen]) }}">{{Str::limit($userTruyen->tieu_de,20)}}</a>
                      </h5>
                      <p class="card-text"><small class="text-muted">{{$userTruyen->created_at}}</p>
                    </div>
                  </div>
                </div>
              </div>

              @endforeach
              @else
              <h4>Đăng nhập để hiện truyện theo dõi</h4>
              @endif
        </div> --}}
@endsection
