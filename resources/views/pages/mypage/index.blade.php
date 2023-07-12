@extends('layouts.index')

@section('content')
    <div class="row mt-2">
        <table class="table table-hover table-centered mb-0">
            <thead>
                <tr>
                    <th>{{__('messages.no')}}</th>
                    <th>{{__('messages.userID')}}</th>
                    <th>{{__('messages.match.datetime')}}</th>
                    <th>{{__('messages.result')}}</th>
                    <th>{{__('messages.point')}}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach($histories as $history)
                    @php
                        $i++;
                    @endphp
                    <tr>
                        <td>{{($histories->currentPage()-1) * $histories->perPage() + $i}}</td>
                        @if($history->playerOne->id == Auth::user()->id)
                            <td>{{$history->playerTwo->name}}</td>
                            <td>{{$history->match_date}} {{$history->match_time}}</td>
                            <td class="{{$history->score2 > $history->score1 ? 'text-danger' : 'text-primary'}}">{{$history->score2}}:{{$history->score1}}</td>
                            <td>{{$history->playerTwo->point}}</td>
                        @else
                            <td>{{$history->playerOne->name}}</td>
                            <td>{{$history->match_date}} {{$history->match_time}}</td>
                            <td class="{{$history->score2 < $history->score1 ? 'text-danger' : 'text-primary'}}">{{$history->score1}}:{{$history->score2}}</td>
                            <td>{{$history->playerOne->point}}</td>
                        @endif
                    </tr>
                @endforeachs
            </tbody>
        </table>
    </div>
    <div class="pagination row mt-2">
        <div class="col-12">
            {{ $histories->links('vendor.pagination.default') }}
        </div>
    </div>                                      
@endsection

@section('script')

@endsection