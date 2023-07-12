<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Badminton" name="description" />
        <meta content="Badminton" name="Badminton" />
        <meta name="description" content=""/>
        <!-- Facebook Meta Tags -->
        <meta property="og:url" content="{{route('home')}}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{__('messages.logo')}}">
        <meta property="og:description" content="">
        
        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:domain" content="">
        <meta property="twitter:url" content="{{route('home')}}">
        <meta name="twitter:title" content="{{__('messages.logo')}}">
        <meta name="twitter:description" content="">
        <!-- Meta Tags Generated via https://www.opengraph.xyz -->

        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="robots" content="noindex, nofollow, noarchive">

        <meta name="keywords" content="badminton"/>
        <title>{{__('messages.logo')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    
        <!-- Styles -->
        @include('layouts.head-css')

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <!-- Begin page -->
        <div class="wrapper">
            @include('layouts.menu')
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        @include('layouts.footer-scripts')
    </body>
</html>
