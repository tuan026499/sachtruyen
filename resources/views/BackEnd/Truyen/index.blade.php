@extends('BackEnd.index')
@section('content')
<div class="col-12">
  <div class="card">
      <a href="{{ route('truyen.create') }}" class="btn btn">Thêm mới</a>
      <div class="card-header">
          <h3 class="card-title">Truyện</h3>
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
          <table id="example2" class="table table-hover" style="margin: auto">
              <thead>
                  <tr>
                      <th class="text-center">STT</th>
                      <th class="text-center">Tiêu đề </th>
                      <th class="text-center">Tác giả</th>
                      <th class="text-center">Ảnh đại diện</th>
                      <th class="text-center">Trạng thái</th>
                      <th class="text-center">Tình trạng</th>
                      <th style="width: 9rem" class="text-center" style="margin: auto">Acction</th>

                  </tr>
              </thead>
              <tbody>
                  @foreach ($truyen as $item)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ Str::limit($item->tieu_de, 20) }}</td>
                          <td>{{ $item->tac_gia }}</td>
                          <td><img src="{{ asset('storage/' . $item->image) }}" style="width: 70px;"></td>
                          <td>
                              @if ($item->trang_thai == 0)
                                  <span class="text text-danger">Ẩn</span>
                              @else
                                  <span class="text text-success">Hiện</span>
                              @endif
                          </td>


                          <td>
                              @if ($item->tinh_trang == 0)
                                  <span class="text text-danger">Tạm Ngưng</span>
                              @elseif($item->tinh_trang==1)
                                  <span class="text text-warning">Đang Tiến Hành</span>
                              @else
                                  <span class="text text-success">Hoàn Thành</span>
                              @endif
                          </td>
                          <td>
                              {{-- SỬA TRUYỆN --}}
                              <a href="{{ route('truyen.edit', [$item->id]) }}">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                              </a>
                              {{-- END SỬA TRUYỆN --}}
                              {{-- CHI TIẾT TRUYỆN --}}
                              
                              <a href="{{ route('chapter.show', $item->slug_truyen) }}">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                      <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                      <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                    </svg>
                              </a>
                              {{-- END CHI TIẾT TRUYỆN --}}
                              <a href="{{ route('truyen.delete', [$item->id]) }}" 
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
          {{ $truyen->links() }}
      </div>
      <!-- /.card-body -->
  </div>
</div>
@endsection