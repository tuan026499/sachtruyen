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

<div class="card volume-list" style="background-color:#1f1f1f">
    <h5 class="card-header text-white">Bình luận ({{ $truyen->comments->count() }})</h5>
    @if (Auth::check())
        <div class="card-body ">
            {{-- <div class="comment-area mt-4">
                        <div class="card card-body"> --}}
            <h6 class="card-title text-white">Leave a comment</h6>
            <form action="{{ route('comment') }}" method="post"  >
                @csrf
                <input type="hidden" name="slug_truyen" value=" {{ $truyen->slug_truyen }}">
                <input type="hidden" name="truyen_id" id="truyen_id" value="{{ $truyen->id }}">

                <input type="hidden" name="user_id" id="user_id" value="{{ auth::user()->id }}">

                <textarea name="comment_body" id="comment_body" class="form-control" rows="3"> </textarea>

                <button type="submit" class="btn btn-primary btn-save">submit</button>
            </form>
            <hr>
            {{-- </div>
                    </div> --}}

        </div>
    @else
        <div class="card-body ">
            <h6 class="card-title text-white">Vui lòng đăng nhập để bình luận...</h6>
        </div>
    @endif
    <hr style="width:90%;margin:0 auto">

</div>
<div class="card" style="margin-top: 10px;width:100%;background-color:#1f1f1f">
    <div class="card-body">

        <div id="comments">
            @foreach ($truyen->comments as $comments)
                <div class="comment">
                    {{-- @if ($comments->user) --}}

                    <a href="" class="avatar">
                        <img src="{{ asset('storage/user_image/' . $comments->user->image) }}" class="lazyload "
                            style="width: 50px; height:50px; border-radius: 50%;margin-right:10px">
                    </a>
                    <div class="body-wrapper">
                        <div class="header">
                            <div class="left">
                                <b>
                                    <a href="" class="text-white">{{ $comments->user->username }}</a>
                                </b>
                                {{-- @endif --}}
                                <a href="">
                                    <time style="color:#c5c5c5">
                                        {{ $comments->created_at->diffForHumans() }}
                                    </time>
                                </a>
                            </div>

                            <div class="right">
                                <button class="btn btn-unstyled comment-flag">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                                        <path
                                            d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z" />
                                    </svg>
                                </button>
                                <button class="btn btn-unstyled comment-delete hidden"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="body text-white">{{ $comments->comment_body }}</div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</div>



