<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Badminton" name="Badminton" />
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    
        <!-- Styles -->
        @include('layouts.head-css')
        <!-- Include Parsley.js CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/src/parsley.min.css">


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body id="auth_body">
        <!-- Begin page -->
        <div class="wrapper">
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">
                            <a href="{{route('home')}}" class="auth-logo">
                                <span class="logo-lg">
                                    <img src="assets/images/logo.png" alt="dark logo">
                                </span>
                            </a>
                        </div>
                        <!-- Portlet card -->
                        <div class="card mb-md-0 mb-3 auth-card">
                            <div class="card-body">
                                <div id="cardCollpase1" class="collapse pt-3 show">
                                    @yield('content')
                                </div>
                            </div>
                        </div> <!-- end card-->
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
