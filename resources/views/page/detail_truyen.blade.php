@extends('FrontEndLayouts.master')
@section('title', 'home')
@section('content')
<nav aria-label="breadcrumb" style="margin-top: 5px; color:#1f1f1f ">
    <ol class="breadcrumb" >
        <li class="breadcrumb-item"><a  href="{{ route('trang-chu') }}">Home</a></li>
        <li class="breadcrumb-item"><a  href="">Truyện</a></li>
        <li class="breadcrumb-item " aria-current="page">
            <a  href="{{ route('xem-truyen', $truyen->slug_truyen) }}">{{ $truyen->tieu_de }}</a>
        </li>
    </ol>
</nav>
{{-- <div class="card">

    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>A well-known quote, contained in a blockquote element.</p>
        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
      </blockquote>
    </div>
  </div>
  </div> --}}
    
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
    <div class="row ">
        <div class="card" style="width:100%;background-color:#1f1f1f ">
            <div class="card-body top-part">
                <div class=" col-md-6 image-float text-center" style="margin:auto">
                    <img src="{{ asset('storage/' . $truyen->image) }}"id="favorites_truyenimage{{$truyen->image}}" class="rounded mx-auto d-block" style="margin: auto;width:50%" alt="">
                </div>
                <div class=" col-md-6" style="float:right">
                    <a href="">
                        <h3 style="margin: 10px" class="text-white text-center">{{ $truyen->tieu_de }}</h3>
                    </a>
                    {{-- <p class="text-white" style="margin-left: 100px">[Cập nhật lúc: {{ $truyen->updated_at->diffForHumans() }} -
                        {{ $truyen->updated_at->format('d/m/Y H:i:s') }} ]</p> --}}
                    <ul class="infortruyen" style="list-style: none;margin: 10px">
                        <li style="margin-top:10px;margin-bottom: 10px " class="text-white">

                            Tác giả:<a href="" readonly>
                                {{ $truyen->tac_gia }}</a>
                        </li>
                        <li style="margin-top:10px;margin-bottom: 10px " class="text-white">
                            <strong>Thể loại:</strong>
                            <a href=""  class="text-white">
                                @foreach ($truyen->category_truyen as $category)
                                <span class="badge rounded-pill bg-light text-dark text-white">
                                     {{ $category->cate_name }}
                                </span>
                                @endforeach
                            </a>
                        </li
                        <li style="margin-top:10px;margin-bottom: 10px " class="text-white">
                            <strong class="text-white">Loại truyện:</strong>
                            <a href=""  class="text-white">
                                {{-- @foreach ($truyen->theloai as $theloais) --}}
                                <span class="badge rounded-pill bg-light text-dark text-white">
                                     {{ $truyen->theloai->ten_the_loai }}
                                </span>
                                {{-- @endforeach --}}
                            </a>
                        </li>
                        {{-- <li style="margin-top:10px;margin-bottom: 10px "class="text-white">
                            <p>
                                <strong>Danh mục:</strong>
                                <a href="{{ route('danh-muc', ['slug' => $truyen->danhmuc->slug_danh_muc]) }}">
                          {{ $truyen->danhmuc->ten_danh_muc }} </a>
                                <a href="" class="text-white">{{ $truyen->danhmuc->ten_danh_muc }}</a>
                            </p>
                        </li> --}}
                        <li style="margin-top:10px;margin-bottom: 10px ">
                            <p>
                                <strong class="text-white">Lượt xem: 1000</strong>
                            </p>

                        </li>
                        <li style="margin-top:10px;margin-bottom: 10px ">
                            <p>
                                <strong class="text-white">
                                    Trạng thái:
                                </strong>
                                @if ($truyen->tinh_trang == 0)
                                    <span class="text-danger"> Tạm ngưng</span>
                                @elseif($truyen->tinh_trang == 1)
                                    <span class="text-primary"> Đang tiến hành</span>
                                @else
                                    <span class="text-success"> Đã hoàn thành</span>
                                @endif
                            </p>
                        </li>
                        <li style="margin-top:10px;margin-bottom: 10px " class="text-white">

                           <strong>
                            Cập nhật lúc:
                        </strong> 
                        <a href="">
                             {{ $truyen->updated_at->diffForHumans() }}
                        
                               </a>
                            
                        </li>
                        <li style="margin-top:10px;margin-bottom: 10px ">
                            {{-- @if (is_null($chapter_dau))
                          <a href="{{ url('xem-chapter/' . $chapter_dau) }} "
                              class="btn btn-primary isDisabled">Đọc từ đầu</a>
                      @else
                          <a href="{{ route('xem-chapter', [$truyen->slug_truyen, $chapter_dau->slug_chapter]) }} "
                              class="btn btn-primary">Đọc từ đầu</a>
                      @endif
                      @if (is_null($chapter_cuoi))
                          <a href="{{ url('xem-chapter/' . $chapter_cuoi) }}" class="btn btn-primary isDisabled">
                              Đọc mới nhất</a>
                      @else
                          <a href="{{ route('xem-chapter', [$truyen->slug_truyen, $chapter_cuoi->slug_chapter]) }}"
                              class="btn btn-primary "> Đọc mới nhất</a>
                      @endif --}}
                     
                    @auth
                    @if(Auth::user()->favorite_comic->contains('id', $truyen->id))  
                    {{-- Từ auth lấy user đã login. Trỏ đến relation favorate. Check contain (có)   
                         Ở relation có chứa id = $truyen->id không --}}
                    <a href="{{ route('remove-favorite',[$truyen->id]) }}" class="btn btn-danger " >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 
                                0 0 0-2-2H4a2 2 0 0 0-2 2v13.5zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z" />
                        </svg>
                        xoá khỏi yêu thích
                    </a> 
                      @else  
                    <a href="{{ route('store-favorite',[$truyen->id]) }}" class="btn btn-primary" 
                        {{(request()->route()->getName()=='remove.favorite_comic')?'active':""}}>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v13.5zM8 
                                4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z" />
                        </svg>
                        yêu thích
                    </a> 
                      @endif
                      
                      @endauth
                        </li>

                    </ul>
                </div>

            </div>
            {{-- <div class="card-body"> --}}
            <div class="row" style="margin:auto;width: 100%;">
                <div class="col-12">
                    <div class="row statistic-list">
                        <div class="col-12 col-md-3 statistic-item">
                            <div class="statistic-name text-white">
                                Lần cuối
                            </div>
                            <div class="statistic-value text-white">
                                {{ $truyen->updated_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="col-4 col-md-3 statistic-item">
                            <div class="statistic-name text-white">
                                Số chapter
                            </div>
                            
                            <div class="statistic-value text-white">
                               {{count($chapter)}}
                            </div>
                        </div>
                        <div class="col-4 col-md-3 statistic-item">
                            <div class="statistic-name text-white">
                                Đánh giá
                            </div>
                            <div class="statistic-value text-white">
                                4/5
                            </div>
                        </div>
                        <div class="col-4 col-md-3 statistic-item text-white">
                            <div class="statistic-name text-white">
                                Lượt xem
                            </div>
                            <div class="statistic-value">
                                2.111
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- <div class="summary-wrapper col-12">
                    <div class="series-summary">
                        <h4 class="summary-title text-white">Tóm Tắt</h4>
                        <div class="summary-content text-white">
                            {{ strip_tags(html_entity_decode($truyen->mo_ta_ngan)) }}
                        </div>
                    </div>
                </div> --}}
            </div>
            
            {{-- </div> --}}

        </div>
        <div class="" style="background-color:#1f1f1f ;margin-top:20px;width:100%">
            <h4 class="card-header text-white" >Tóm Tắt</h4>
            <hr style="background-color:white">
            <div class="card-body text-white">
              <p class="card-text">{{ strip_tags(html_entity_decode($truyen->mo_ta_ngan)) }}</p>
            </div>
          </div>
        <div class="card volume-list" style="background-color:#1f1f1f">
            <h5 class="card-header text-white">Danh Sách Chương</h5>
            <div class="card-body ">
                <div class="row border-bottom">
                    <div class="col-6 chapter-title text-white">
                        <h4>Số chương</h4>
                    </div>
                    <div class="col-6 chapter-dayupdate text-white">
                        <h4> Ngày cập nhật</h4>
                    </div>
                </div>
                <nav class="list-chapter text-white">
                    <ul>
                        @if (count($chapter) > 0)
                            @forelse($chapter as $item)
                                <li class="row">
                                    <div class="col-md-6 chapter ">
                                        <a href="{{ route('doc-chapter', [$truyen->slug_truyen, $item->slug_chapter]) }}"
                                            class="color-a text-white">{{ $item->chapter_name }}</a>
                                    </div>
                                    <div class="col-md-6 text-center no-wrap medium chapter-time" style="width: 570px;">
                                        {{ $item->updated_at->diffForHumans() }}
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li class="row">
                                <div class="col-md-6 chapter ">
                                    <p >Chapter đang được cập nhật...</p>
                                </div>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        @include('page.comment')
        </div>
        @endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
