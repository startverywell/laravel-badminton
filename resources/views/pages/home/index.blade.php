@extends('layouts.index')

@section('content')
    @auth
    <form class="custom-validation" action="{{route('authenticate')}}" id="custom-form" method="post">
        @csrf
        <div class="row mt-2">
            <div class="col-1"></div>
            <div class="col-6">
                <input type="text" class="form-control app-input-small" name="name" readonly>
            </div>
            <div class="col-4 text-center">
                <button type="submit" class="btn btn-outline-primary rounded-pill">{{__('messages.match')}}</button>
            </div>      
        </div>
    </form>
    @endauth
    <div class="row mt-2">
        <table class="table table-hover table-centered mb-0">
            <thead>
                <tr>
                    <th>{{__('messages.no')}}</th>
                    <th>{{__('messages.userID')}}</th>
                    <th>{{__('messages.level')}}</th>
                    <th>{{__('messages.win')}}</th>
                    <th>{{__('messages.lose')}}</th>
                    <th>{{__('messages.point')}}</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>                                      
@endsection

@section('script')

@endsection