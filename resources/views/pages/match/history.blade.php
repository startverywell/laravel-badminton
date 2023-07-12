@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<link rel="stylesheet" href="{{ URL::asset('assets/vendor/daterangepicker/daterangepicker.css') }}" type="text/css" />
<link href="{{ URL::asset('assets/vendor/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    @auth
    <input type="hidden" id="point" value="{{Auth::user()->point}}">  
    <form class="custom-validation" action="{{route('match.save')}}" id="history-form" method="post">
        @csrf
        <input type="hidden" name="player1" value="{{Auth::user()->id}}">  
        <div class="row mt-5">
            <div class="col-5">
                <h4 class="text-right text-black">{{__('messages.userID')}}</h4>
            </div> 
            <div class="col-7">
                <select class="form-select" id="single-select-field" name="player2" data-placeholder="{{__('messages.choose_player')}}" required>
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
                <input class="form-control single-date-picker app-input-small" id="date" type="text" name="match_date" required>                    
            </div>    
        </div>
        <div class="row mt-3">
            <div class="col-5">
                <h4 class="text-right text-black">{{__('messages.match.time')}}</h4>
            </div> 
            <div class="col-7">
                <input id="timepicker" type="text" class="form-control app-input-small" name="match_time" required>                    
            </div>    
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <h4 class="text-center text-primary">{{Auth::user()->name}}</h4>
            </div> 
            <div class="col-6">
                <h4 class="text-center text-primary player2_name">{{__('messages.player2')}}</h4>                    
            </div>    
        </div>
        <div class="row mt-3">
            <div class="col-1"></div>
            <div class="col-4">
                <input class="form-control app-input-small" type="number" max="21" min="0" name="score1" id="score1" required>
            </div>
            <div class="col-2">
                <hr/>
            </div> 
            <div class="col-4">
                <input class="form-control app-input-small" type="number" max="21" min="0" name="score2" id="score2" required>                    
            </div>    
        </div>
        <div class="row mt-4">
            <div class="col-1"></div>
            <div class="col-5 d-grid">
                <a href="{{route('home')}}" class="btn btn-outline-primary rounded-pill text-primary">{{__('messages.back')}}</a>
            </div>
            <div class="col-5 d-grid">
                <button type="button" id="modal_show" class="btn btn-outline-primary rounded-pill">{{__('messages.add')}}</button>
            </div>
        </div>
    </form>
    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-6">
                            <h4 class="text-right text-black">{{__('messages.userID')}}</h4>
                        </div> 
                        <div class="col-6">
                            <h4 class="text-left text-black player2_name">{{__('messages.player2')}}</h4>
                        </div>    
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <h4 class="text-right text-black">{{__('messages.match.date')}}</h4>
                        </div> 
                        <div class="col-6">
                            <h4 class="text-left text-black" id="date_text"></h4>                    
                        </div>    
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <h4 class="text-right text-black">{{__('messages.match.time')}}</h4>
                        </div> 
                        <div class="col-6">
                            <h4 class="text-left text-black" id="time_text"></h4>                    
                        </div>    
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <h4 class="text-center" id="result1"></h4>
                        </div> 
                        <div class="col-6">
                            <h4 class="text-center" id="result2"></h4>
                        </div>   
                    </div>
                    <div class="row mt-4">
                        <div class="col-1"></div>
                        <div class="col-5 d-grid">
                            <button data-bs-dismiss="modal" aria-hidden="true" class="btn btn-outline-primary rounded-pill text-primary">{{__('messages.back')}}</button>
                        </div>
                        <div class="col-5 d-grid">
                            <button type="button" id="history_save" class="btn btn-outline-primary rounded-pill">{{__('messages.add')}}</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
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
        }, function(start, end, label) {
            console.log(start.format('YYYY-MM-DD'));
            $('#date_text').html(start.format('YYYY-MM-DD'));
        });

        $("#timepicker").flatpickr({
            enableTime:!0,
            noCalendar:!0,
            dateFormat:"H:i",
            time_24hr:!0
        });

        $('#single-select-field').change(()=>{
            $('.player2_name').html($(`#single-select-field>option[value="${$('#single-select-field').val()}"]`).text());
        });

        // $('.single-date-picker').change((e) => {
        //     $('#date_text').html(e.target.value);
        // });
        
        $('#timepicker').change((e) => {
            $('#time_text').html(e.target.value);
        });

        $('#modal_show').click(()=>{
            let valid = true;
            let ids = [
                '#single-select-field',
                '#date',
                '#timepicker',
                '#score1',
                '#score2'
            ];
            ids.forEach(element => {
                let instance = $(element).parsley();
                if(!instance.isValid()) valid = false;
            });
            
            if (!valid) {
                $('#history-form').submit();
                return false;
            }
            let s1 = $('#score1').val();
            let s2 = $('#score2').val();
            let point = $('#point').val();
            let color = s1 > s2 ? 'text-danger' : 'text-primary';
            $('#result1').removeClass('text-danger');
            $('#result1').removeClass('text-primary');
            $('#result1').addClass(color);

            $('#result2').removeClass('text-danger');
            $('#result2').removeClass('text-primary');
            $('#result2').addClass(color);
            $('#result1').html(s1 > s2 ? `{{__('messages.win')}}` : `{{__('messages.lose')}}`);
            $('#result2').html(s1 > s2 ? `${point} + 30` : `${point} - 30 + ${s1}`);

            $('#centermodal').modal('show');
        });

        $('#history_save').click(()=>{
            $('#history-form').submit();
        });
    });
    
</script>
@endsection