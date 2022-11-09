@extends('BackEnd.index')
@section('content')
<div class="col-12">
    <a href="{{ route('role.create') }}" class="btn btn">Thêm mới</a>
  <div class="card">
      
      <div class="card-header">
          <h3 class="card-title">Role</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
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
          <table class="table table-responsive table-full-width text-center" >
            @csrf
              <thead>
                  <tr>
                      <th >STT</th>
                      <th >Role </th>
                      <th >Acction</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($role as $item)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->role_name }}</td>
                          <td>
                              {{-- EDIT ROLE --}}
                              <a href="{{ route('role.edit', [$item->id]) }}">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                              </a>
                              {{-- END SỬA TRUYỆN --}}
                              {{-- CHI TIẾT TRUYỆN --}}
                              
                              {{-- <a href="{{ route('chapter.show', $item->slug_truyen) }}">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                      <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                      <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                    </svg>
                              </a> --}}
                              {{-- END CHI TIẾT TRUYỆN --}}
                              <a href="{{ route('role.delete',['id'=>$item->id]) }}" 
                                  onclick="return confirm('Bạn chắc chắn muốn xoá?')"> 
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                              </a>

                          </td>

                      </tr>
                  @endforeach

              </tbody>

          </table>
      </div>
      <!-- /.card-body -->
  </div>
</div>
@endsection
<script type="text/javascript">
function showNotification(from, align){
	color = Math.floor((Math.random() * 4) + 1);

	$.notify({
		icon: "pe-7s-gift",
		message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

	},{
		type: type[color],
		timer: 4000,
		placement: {
			from: from,
			align: align
		}
	});
}
</script>