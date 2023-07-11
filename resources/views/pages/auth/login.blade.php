@extends('layouts.auth')

@section('content')
    <form class="custom-validation" action="{{route('authenticate')}}" id="custom-form" method="post">
        @csrf
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <input type="text" class="form-control app-input" name="name" placeholder="{{__('messages.userID')}}" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 mt-4">
                <input type="password" class="form-control app-input" name="password" placeholder="{{__('auth.password')}}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <a href="#" class="side-nav-link text-center">
                    <h3 class="black-color">{{__('auth.forgetpassword')}}</h3>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-2">
                <a href="{{route('register')}}" class="side-nav-link text-center">
                    <h3 class="black-color">{{__('auth.register')}}</h3>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 mt-2 d-grid">
                <button type="submit" class="btn btn-lg btn-outline-primary rounded-pill">{{__('auth.login')}}</button>
            </div>
        </div>
    </form>                                       
@endsection

@section('script')
<!-- Include Parsley.js JS -->
<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
<script src="{{ URL::asset('/assets/js/form-validation.init.js') }}"></script>
@endsection