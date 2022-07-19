@extends('FrontEndLayouts.master')
@section('title', 'home')
@section('content')

    <nav aria-label="breadcrumb" style="margin-top: 5px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('trang-chu') }}">Home</a></li>
            <li class="breadcrumb-item">Truyện</li>
            <li class="breadcrumb-item " aria-current="page">
                <a href="{{ route('xem-truyen', $truyen->slug_truyen) }}">{{ $truyen->tieu_de }}</a>
            </li>
        </ol>
    </nav>
    <div class="row justify-content-md-center">
        <div class="card" style="width:100%">
            <div class="card-body top-part">
                <div class=" col-md-3 image-float ">
                    <img src="{{ asset('storage/' . $truyen->image) }}" class="card-img-top" style="margin: 10px" alt="">
                </div>
                <div class=" col-md-9 " style="float:right">
                    <a href="">
                        <h3 style="margin: 10px">{{ $truyen->tieu_de }}</h3>
                    </a>
                    @foreach ($truyen->category_truyen as $category)
                        <a href="" style="color:rgb(197, 195, 194);width:90px;height:90px"><span
                                class="badge rounded-pill bg-light text-dark text-dark">{{ $category->cate_name }}</span></a>
                    @endforeach
                    <p style="margin-left: 100px">[Cập nhật lúc: {{ $truyen->updated_at->diffForHumans() }} -
                        {{ $truyen->updated_at->format('d/m/Y H:i:s') }} ]</p>
                    <ul class="infortruyen" style="list-style: none;margin: 10px">
                        <li style="margin-top:10px;margin-bottom: 10px ">

                            Tác giả:<a href="">
                                {{ $truyen->tac_gia }}</a>
                        </li>
                        <li style="margin-top:10px;margin-bottom: 10px ">

                            <p>
                                <strong>Danh mục:</strong>
                                {{-- <a href="{{ route('danh-muc', ['slug' => $truyen->danhmuc->slug_danh_muc]) }}">
                          {{ $truyen->danhmuc->ten_danh_muc }} </a> --}}
                                <a href="">{{ $truyen->danhmuc->ten_danh_muc }}</a>
                            </p>
                        </li>
                        <li style="margin-top:10px;margin-bottom: 10px ">
                            <p>
                                <strong>Lượt xem: </strong>1000
                            </p>

                        </li>
                        <li style="margin-top:10px;margin-bottom: 10px ">
                            <p>
                                <strong>
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
                            <button class="btn btn-danger btn-thich-truyen">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v13.5zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z" />
                                </svg>
                                Thêm vào yêu thích</button>

                        </li>

                    </ul>
                </div>

            </div>
            {{-- <div class="card-body"> --}}
            <div class="row" style="margin:auto;width: 100%;">
                <div class="col-12">
                    <div class="row statistic-list">
                        <div class="col-12 col-md-3 statistic-item">
                            <div class="statistic-name">
                                Lần cuối
                            </div>
                            <div class="statistic-value">
                                {{ $truyen->updated_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="col-4 col-md-3 statistic-item">
                            <div class="statistic-name">
                                Số từ
                            </div>
                            <div class="statistic-value">
                                60,500
                            </div>
                        </div>
                        <div class="col-4 col-md-3 statistic-item">
                            <div class="statistic-name">
                                Đánh giá
                            </div>
                            <div class="statistic-value">
                                4/5
                            </div>
                        </div>
                        <div class="col-4 col-md-3 statistic-item">
                            <div class="statistic-name">
                                Lượt xem
                            </div>
                            <div class="statistic-value">
                                2.111
                            </div>
                        </div>
                    </div>
                </div>
                <div class="summary-wrapper col-12">
                    <div class="series-summary">
                        <h4 class="summary-title">Tóm Tắt</h4>
                        <div class="summary-content">
                            {{-- {{html_entity_decode($truyen->mo_ta_ngan,ENT_QUOTES,"UTF-8")}} --}}
                            {{ strip_tags(html_entity_decode($truyen->mo_ta_ngan)) }}
                        </div>
                    </div>

                </div>
            </div>
            {{-- </div> --}}

        </div>

        <div class="card volume-list">
            <h5 class="card-header">Danh Sách Chương</h5>
            <div class="card-body ">
                <div class="row border-bottom">
                    <div class="col-6 chapter-title">
                        <h4>Số chương</h4>
                    </div>
                    <div class="col-6 chapter-dayupdate">
                        <h4> Ngày cập nhật</h4>
                    </div>
                </div>
                <nav class="list-chapter ">
                    <ul>
                        @if (count($chapter) > 0)
                            @forelse($chapter as $item)
                                <li class="row">
                                    <div class="col-md-6 chapter ">
                                        <a href="{{ route('doc-chapter', [$truyen->slug_truyen, $item->slug_chapter]) }}"
                                            class="color-a">{{ $item->tieu_de }}</a>
                                    </div>
                                    <div class="col-md-6 text-center no-wrap medium chapter-time" style="width: 570px;">
                                        {{ $item->updated_at->diffForHumans() }}
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li class="row">
                                <div class="col-md-6 chapter ">
                                    <p>Chapter đang được cập nhật...</p>
                                </div>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('success') }}
            </div>
        @elseif(Session::has('failed'))
            <div class="alert alert-success alert-dismissible">
                {{-- <button type="button" class="close" data-dismiss="alert">×</button> --}}
                {{ Session::get('failed') }}
            </div>
        @endif

        <div class="card volume-list">
            <h5 class="card-header">Bình luận ({{$truyen->comments->count()}})</h5>
            @if (Auth::check())
                <div class="card-body ">
                    {{-- <div class="comment-area mt-4">
                        <div class="card card-body"> --}}
                    <h6 class="card-title">Leave a comment</h6>
                    <form action="{{ route('comment') }}" method="post">
                        @csrf
                        <input type="hidden" name="slug_truyen" value=" {{ $truyen->slug_truyen }}">
                        <input type="hidden" name="truyen_id" value="{{ $truyen->id }}">
                        <textarea name="comment_body" class="form-control" rows="3"> </textarea>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                    <hr>
                    {{-- </div>
                    </div> --}}
                   
                </div>
            @else
                <div class="card-body ">
                    <h6 class="card-title">Vui lòng đăng nhập để bình luận...</h6>
                </div>
            @endif
            <hr style="width:90%;margin:0 auto">
            <br>
            <div class="be-comment-block">
                @foreach($truyen->comments as $comments)
                <div class="be-comment">
                    <div class="be-img-comment">	
                        <a href="">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
                        </a>
                    </div>
                    <div class="be-comment-content">
                        @if($comments->user)
                            <span class="be-comment-name">
                                <a href="#">{{$comments->user->username}}</a>
                        @endif
                            </span>
                            <span class="be-comment-time">
                                <i class="fa fa-clock-o"></i>
                               {{$comments->created_at->diffForHumans() }}
                            </span>
            
                        <p class="be-comment-text">
                            {{$comments->comment_body}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
                </div>
            </div>
@endsection