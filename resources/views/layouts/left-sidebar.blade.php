<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">
    <!-- Brand Logo Dark -->
    @include('layouts.logo')

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">
            @auth
                <li class="side-nav-item">
                    <a href="{{route('mypage')}}" class="side-nav-link">
                        <i class="uil-calender"></i>
                        <span> {{__('menu.mypage')}}r </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('match.history')}}" class="side-nav-link">
                        <i class="uil-comments-alt"></i>
                        <span> {{__('menu.match.history')}} </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('logout')}}" class="side-nav-link">
                        <i class="uil-comments-alt"></i>
                        <span> {{__('auth.logout')}} </span>
                    </a>
                </li>
            @else
                <li class="side-nav-item">
                    <a href="{{route('login')}}" class="side-nav-link">
                        <i class="uil-comments-alt"></i>
                        <span> {{__('auth.login')}} </span>
                    </a>
                </li>
            @endauth
        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->