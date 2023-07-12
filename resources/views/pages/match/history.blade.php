@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<link rel="stylesheet" href="{{ URL::asset('assets/vendor/daterangepicker/daterangepicker.css') }}" type="text/css" />
<link href="{{ URL::asset('assets/vendor/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    @auth
    <form class="custom-validation" action="{{route('match.save')}}" id="custom-form" method="post">
        @csrf
        <input class="form-control single-date-picker" type="hidden" name="player1" value="{{Auth::user()->id}}">  
        <div class="row mt-5">
            <div class="col-5">
                <h4 class="text-right text-black">{{__('messages.userID')}}</h4>
            </div> 
            <div class="col-7">
                <select class="form-select" id="single-select-field" name="player2" data-placeholder="{{__('messages.choose_player')}}">
                    <option></option>
                    @foreach($users as $user)
                        @if(!is_null($player2))
                            <option value="{{$user->id}}" selected>{{$user->name}}</option>
                        @else
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>    
        </div>
        <div class="row mt-3">
            <div class="col-5">
                <h4 class="text-right text-black">{{__('messages.match.date')}}</h4>
            </div> 
            <div class="col-7">
                <input class="form-control single-date-picker app-input-small" type="text" name="match_date">                    
            </div>    
        </div>
        <div class="row mt-3">
            <div class="col-5">
                <h4 class="text-right text-black">{{__('messages.match.time')}}</h4>
            </div> 
            <div class="col-7">
                <input id="timepicker" type="text" class="form-control app-input-small" name="match_time">                    
            </div>    
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <h4 class="text-center text-primary">{{Auth::user()->name}}</h4>
            </div> 
            <div class="col-6">
                <h4 class="text-center text-primary" id="player2_name">{{__('messages.match.time')}}</h4>                    
            </div>    
        </div>
        <div class="row mt-3">
            <div class="col-1"></div>
            <div class="col-4">
                <input class="form-control app-input-small" type="text" name="score1">
            </div>
            <div class="col-2">
                <hr/>
            </div> 
            <div class="col-4">
                <input class="form-control app-input-small" type="text" name="score2">                    
            </div>    
        </div>
    </form>
    @endauth                                      
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Daterangepicker js -->
<script src="{{ URL::asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
<script>
    $(document).ready(() => {
        $( '#single-select-field' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );

        const locale_datetimepicker = {
        format: 'YYYY-MM-DD',
            "daysOfWeek": [
                "日",
                "月",
                "火",
                "水",
                "木",
                "金",
                "土"
            ],
            "monthNames": [
                "1月",
                "2月",
                "3月",
                "4月",
                "5月",
                "6月",
                "7月",
                "8月",
                "9月",
                "10月",
                "11月",
                "12月"
            ],
        };


        $('.single-date-picker').daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            locale: locale_datetimepicker
        });

        $("#timepicker").flatpickr({
            enableTime:!0,
            noCalendar:!0,
            dateFormat:"H:i",
            time_24hr:!0
        });

        $('#single-select-field').change(()=>{
            $('#player2_name').html($('#single-select-field').text());
        });
    });
    
</script>
@endsection