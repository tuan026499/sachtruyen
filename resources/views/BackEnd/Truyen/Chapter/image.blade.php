@extends('BackEnd.index')
@section('content')
<h3>Image <span class="text-primary">{{$chapter->title}}</span></h3>
      <a href="{{ route('chapter.show', $truyen->slug_truyen) }}" class="btn btn-danger">go back</a>
      <div class="row mt-4">
        @foreach ($images as $item)
        <div class="col-md-3" style="">
       <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
        <div class="card-body text-center" >
          <img class="img-thumbnail" src="{{ asset('storage/upload/chapter/'.$item->image) }}" alt="Card image cap" width:100px>
        </div>
        <a href="" class="btn btn-primary text-white" style="background-color:#e60707">Xoa</a>
       </div>
         
       
      </div> 
      @endforeach
      </div>
@endsection