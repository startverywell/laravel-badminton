@extends('layouts.index')

@section('content')
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
@endsection

@section('script')

@endsection