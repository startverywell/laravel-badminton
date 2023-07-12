@php
use App\Models\Level;
$levels = Level::orderBy('id','asc')->get();
@endphp
<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-search">

    <!-- Brand Logo Dark -->
    @include('layouts.logo')

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-search-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <div class="clearfix mt-5">
            <form class="custom-validation" action="{{route('home.search')}}" id="custom-form" method="post">
                @csrf
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="name" placeholder="{{__('messages.userID')}}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <h5 class="text-white">{{__('messages.point')}}</h5>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <input type="text" name="point" data-plugin="range-slider" data-type="double" 
                            data-grid="true" data-min="0" data-max="1000" data-from="200" data-to="800"
                        />
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <h5 class="text-white">{{__('messages.level')}}</h5>
                    </div>
                </div>
                @foreach($levels as $level)
                    <div class="row mt-1">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="form-check">
                                <input type="checkbox" value="{{$level->id}}" name="level[]" class="form-check-input" checked>
                                <label class="form-check-label text-white" for="customCheck1">{{$level->name}}</label>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row mt-2">
                    <div class="col-2"></div>
                    <div class="col-8 mt-2 d-grid">
                        <button type="submit" class="btn btn-soft-primary btn-lg rounded-pill">{{__('messages.search')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->