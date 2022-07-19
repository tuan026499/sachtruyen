<div class="sidebar" data-image={{ asset('assets/img/sidebar-5.jpg')}}>
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:;" class="simple-text">
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
                </div>
                <ul class="nav ">
                    <li class="nav-item {{(request()->route()->getName()=='dasboard')?'active':""}}">
                        <a href="{{ route('dasboard') }}" class="nav-link " >
                            <i class="nc-icon nc-icon nc-bag"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @if(Auth::user()->role=='1')
                    <li class="dropdown nav-item {{(request()->route()->getName()=='the-loai.index') ?'active':""}}" >
                        <a class="nav-link" href="{{ route('the-loai.index') }}">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>THỂ LOẠI</p>
                        </a>
                        
                    </li>
                    <li class="{{(request()->route()->getName()=='danhmuc.index') ?'active':""}}"">
                      <a class="nav-link " href="{{ route('danhmuc.index') }}">
                          <i class="nc-icon nc-paper-2"></i>
                          <p>DANH MỤC</p>
                      </a>
                  </li>
                <li class="{{(request()->route()->getName()=='category.index') ?'active':""}}"">
                    <a class="nav-link " href="{{ route('category.index') }}">
                        <i class="nc-icon nc-paper-2"></i>
                        <p>CATEGORY</p>
                    </a>
                </li>
                <li class="{{(request()->route()->getName()=='role.index') ?'active':""}}"">
                    <a class="nav-link " href="{{ route('role.index') }}">
                        <i class="nc-icon nc-paper-2"></i>
                        <p>ROLE</p>
                    </a>
                </li>
                @endif
                <li class="{{(request()->route()->getName()=='truyen.index') ?'active':""}}"">
                    <a class="nav-link " href="{{ route('truyen.index') }}">
                        <i class="nc-icon nc-paper-2"></i>
                        <p>TRUYỆN</p>
                    </a>
                </li>
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="javascript:;">
                            <i class="nc-icon nc-alien-33"></i>
                            <p>Upgrade plan</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>