@extends('layouts.index')

@section('content')
    @auth
    <div class="row mt-2">
        <div class="col-1"></div>
        <div class="col-6">
            <input type="text" class="form-control app-input-small" id="player_name" readonly>
            <input type="hidden" id="player_id">
        </div>
        <div class="col-4 text-center">
            <button type="button" id="send" class="btn btn-outline-primary rounded-pill">{{__('messages.match')}}</button>
        </div>      
    </div>
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
                @php
                    $i = 0;
                @endphp
                @foreach($users as $user)
                    @php
                        $i++;
                    @endphp
                    <tr class="player-tr" data-id = "{{$user->id}}" data-name = "{{$user->name}}">
                        <td>{{($users->currentPage()-1) * $users->perPage() + $i}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->userLevel->name}}</td>
                        <td class="text-danger">{{$user->win}}</td>
                        <td class="text-primary">{{$user->lose}}</td>
                        <td>{{$user->point}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
    <div class="pagination row mt-2">
        <div class="col-12">
            {{ $users->links('vendor.pagination.default') }}
        </div>
    </div>                                      
@endsection

@section('script')
<script>
    $(document).ready(()=> {
        $('.player-tr').click((e)=>{
            let tr = e.target.parentNode;
            $('#player_name').val(tr.dataset.name);
            $('#player_id').val(tr.dataset.id);
        });

        $('#send').click(()=>{
            let player1 = $('#player_id').val();
            window.location.href = `{{ route('match.history') }}/${player1}`;
        });
    });
</script>
    
@endsection