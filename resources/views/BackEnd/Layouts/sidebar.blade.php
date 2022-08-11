<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
    <img src="{{asset("admin/assets/img/logo-ct.png") }}" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold text-white">Dashboard</span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white active bg-gradient-primary {{(request()->route()->getName()=='dasboard')?'active':""}}" 
          href="{{ route('dasboard') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      @if(Auth::user()->role=='1')
      <li class="nav-item">
        <a class="nav-link text-white {{(request()->route()->getName()=='the-loai.index') ?'active':""}}" 
          href="{{ route('the-loai.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Thể loại</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{(request()->route()->getName()=='danhmuc.index') ?'active':""}}" 
          href="{{ route('danhmuc.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Danh mục</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{(request()->route()->getName()=='category.index') ?'active':""}}" 
          href="{{ route('category.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Category</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{(request()->route()->getName()=='role.index') ?'active':""}}" 
          href="{{ route('role.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Role</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{(request()->route()->getName()=='user.index') ?'active':""}}" 
          href="{{ route('user.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">User</span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link text-white {{(request()->route()->getName()=='truyen.index') ?'active':""}}" 
          href="{{ route('truyen.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Truyện</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
