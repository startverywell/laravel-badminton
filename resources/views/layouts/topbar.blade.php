<?php
use Illuminate\Support\Facades\Auth;
?>
<!-- ========== Topbar Start ========== -->
<div class="navbar-custom">
    <div class="topbar container-fluid">
        <div class="d-flex align-items-center gap-lg-2 gap-1">

            <!-- Topbar Brand Logo -->
            <div class="logo-topbar">
                <!-- Logo light -->
                <a href="{{route('home')}}" class="logo-light">
                    <span class="logo-lg">
                        <img src="{{ URL::asset('assets/images/logo.png')}}" alt="logo">
                    </span>
                </a>
                <!-- Logo Dark -->
                <a href="{{route('home')}}" class="logo-dark">
                    <span class="logo-lg">
                        <img src="{{ URL::asset('assets/images/logo.png')}}" alt="logo">
                    </span>
                </a>
            </div>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-3">
            @auth
            <li class="dropdown d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none button-toggle-search">
                    <i class="ri-search-line font-22"></i>
                </a>
            </li>
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none button-toggle-user">
                    <i class="ri-user-fill font-22"></i>
                </a>
            </li>
            @endauth
            <!-- <li class="d-none d-sm-inline-block">
                <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" title="Theme Mode">
                    <i class="ri-moon-line font-22"></i>
                </div>
            </li>
            <li class="d-none d-md-inline-block">
                <a class="nav-link" href="" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line font-22"></i>
                </a>
            </li> -->
            <li class="dropdown">
                <!-- Sidebar Menu Toggle Button -->
                <button class="button-toggle-menu">
                    <i class="mdi mdi-menu"></i>
                </button>
                <!-- Horizontal Menu Toggle Button -->
                <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
            </li>
        </ul>
    </div>
</div>
<!-- ========== Topbar End ========== -->