@extends('FrontEndLayouts.master')
@section('title', 'home')
@section('content')

  @if(Session::has('success_deleteXA'))
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
<div class="card" style="background-color:#1f1f1f;margin-top:10px">
    <h2 class="text-light title-New-Uploads" style="padding:10px;text-align: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-heart-fill" 
                            viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                      </svg>
        {{Auth::user()->username}}'s favorites ({{$count_user_stories}})
    </h2>
  <div class="card-body">
    <div class="row ">
      <div class="col-md">
        
          <div class="row row-cols-5">
              @foreach ($userStories as $userTruyen)
              
                  <div class="col" style="float:left;widows: 250px;height:310px;margin-top:15px">
                    <a href="{{ route('remove-favorite',[$userTruyen->id]) }}" class="btn btn-danger" style="margin-left:50px;margin-bottom: 10px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                          </svg>
                                Remove
                    </a> 
                      <div class="image-text">
                          <a href="{{ route('xem-truyen', ['slug' => $userTruyen->slug_truyen]) }}">
                              <img src="{{ asset('storage/' . $userTruyen->image) }}" class="card-img-top" alt="..." style="width:100%">
                          </a>
                          <div class="content-text">
                              <a href="{{ route('xem-truyen', ['slug' => $userTruyen->slug_truyen]) }}">
                                  <p class="text-center text-break font-weight-light text-uppercase" id="text-over"
                                      style="color:white">{{ substr($userTruyen->tieu_de,0,30 ) }}</p>
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
<div class="text-center">
    {{ $userStories->links('vendor.pagination.bootstrap-4') }}
</div>

@endsection