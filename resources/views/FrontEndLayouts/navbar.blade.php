<nav class="navbar navbar-expand-lg " style="background-color:#1f1f1f">
    <a class="navbar-brand" href="{{ route('trang-chu') }}">
            <svg xmlns="http://www.w3.org/2000/svg" 
            width="50" height="50" 
            viewBox="45.002 196.466 482.556 209.281">
            <path fill="#EC2854" stroke="#EC2854" stroke-miterlimit="10" 
            d="M217.198 232.5c-16.597 6.907-52.729 34.028-36.249 58.467 7.288 
            10.807 19.94 18.442 31.471 22.057 10.732 3.363 23.897-.761 33.709 
            3.721-2.09 5.103-9.479 23.689-15.812 22.319-11.827-2.544-23.787-.445-33.07 
            8.485-18.958-26.295-45.97-36.974-75.739-29.676 22.066-27.2 16.719-55.687-6.468-81.622-13.999-15.657-47.993-37.963-69.845-28.853 54.591-22.738 121.119-5.555 172.003 25.102-8.815 3.669-3.617-2.179 0 0zm138.167 0c16.595 
            6.908 52.729 34.028 36.249 58.467-7.288 10.807-19.939 18.443-31.473 22.059-10.731 
            3.365-23.896-.762-33.712 3.721 2.104 5.112 9.464 23.671 15.812 22.318 11.826-2.542 
            23.789-.448 33.068 8.484 18.959-26.294 45.974-36.975 75.738-29.676-22.056-27.206-16.726-55.682 
            6.471-81.622 13.997-15.654 47.995-37.967 69.847-28.854-54.586-22.733-121.116-5.562-172 25.103 8.817 
            3.669 3.616-2.18 0 0z"/>
            <path fill="none" d="M723.057 240.921H824.18v56.18H723.057z"/>
            <path fill="#FFF" d="M225.434 293.58h23.199v15.919c6.874-6.563 
            14.154-11.274 21.841-14.137 7.687-2.863 16.234-4.295 25.64-4.295 
            20.621 0 34.549 5.552 41.785 16.653 3.979 6.074 5.969 14.766 5.969 
            26.077v71.95h-24.826v-70.693c0-6.842-1.312-12.358-3.935-16.547-4.344-6.982-12.209-10.473-23.604-10.473-5.789 
            0-10.538.455-14.246 1.363-6.693 1.536-12.572 4.608-17.636 9.216-4.07 3.701-6.716 7.522-7.937 11.467-1.221 3.945-1.832 9.582-1.832 16.913v58.754h-24.419l.001-112.167z"/></svg>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-danger" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
            </button>
          </form>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Thảo luận</a>
            </li>
            @foreach ($danhmuc as $item)
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">{{ $item->ten_danh_muc }}</a>
                </li>
            @endforeach
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Thể Loại
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="width:500px;">
                  @foreach ($categories as $category)
                        <li>
                          <div class="row"  style="float: left;width:150px">
                            <div class="col-sm-3" style="padding:10px;margin-left:20px;"">
                              <a href=""style="float:left;width:100px">{{$category->cate_name}}</a></div>
                          </div>
                           
                        </li>
                        @endforeach
                </ul>
            </li>
            {{-- <form class="form-inline my-2 my-lg-0" method="GET" action="{{route('tim-kiem')}}"">
        <input class="form-control mr-sm-2" type="search" placeholder="Search " id="keywords" name="tukhoa">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> --}}
        </ul>
         
        <ul class="navbar-nav mr-auto">
            @if (Auth::check())
            <a class="nav-link text-light" href="{{ route('show.follow_comic') }}"
            {{ request()->route()->getName() == 'show.follow_comic'? 'active': '' }}>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
              </svg>
            Favorite
            </a>
                <li class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle text-light" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-speedometer2" viewBox="0 0 16 16" style="margin-top:-2px">
                            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
                          </svg>
                       {{ Auth::user()->username }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item text-dark" href="{{ route('profile') }}"
                            {{ request()->route()->getName() == 'profile'? 'active': '' }}>Trang cá nhân</a>
                            @if (Auth::user()->role=='1' || Auth::user()->role=='2')
                        <a class="dropdown-item text-dark" href="{{ route('dasboard') }}"
                        {{ request()->route()->getName() == 'dasboard'? 'active': '' }}>Dashboard</a>
                            @endif
                    </div>
                    <a class="nav-link text-light" href="{{ route('dang-xuat') }}"
                        {{ request()->route()->getName() == 'dang-xuat'? 'active': '' }}>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16" style="margin-top:-2px">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                          </svg>
                        Đăng xuất</a>
                    </li>
                        @else
                        <div class="row" style="width:200px ;">
                            <a class="nav-link text-light" href="{{ route('dang-nhap') }}">Đăng nhập</a>
                        </div>   
                        @endif
                    </ul>
                     </div>
                    </nav>
                    <script type="text/javascript">
                        $('#keywords').keyup(function() {
                            var keywords = $(this).val();
                            if (keywords != '') {
                                var _token = $('input[name="_token"]').val();
                                $.ajax({
                                    url: "{{ url('/timkiem-ajax') }}",
                                    method: "POST",
                                    data: {
                                        keywords: keywords,
                                        _token: _token
                                    },
                                    success: function(data) {
                                        $('#search_ajax').fadeIn();
                                        $('#search_ajax').html(data);
                                    }
                                });
                            } else {
                                $('#search_ajax').fadeOut();
                            }
                        });
                    </script>
