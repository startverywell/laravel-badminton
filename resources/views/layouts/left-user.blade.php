<!-- ========== Left User Start ========== -->
<div class="leftside-user">

    <!-- Brand Logo Dark -->
    @include('layouts.logo')

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-user-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <div class="clearfix">
            <div class="row mt-2">
                <img src="{{ URL::asset('assets/images/user.png')}}" alt="user-image" class="user-img">
            </div>
            <div class="row mt-3">
                <div class="col-2"></div>
                <div class="col-4">
                    <h5 class="text-center text-white">{{__('messages.userID')}}</h5>
                </div> 
                <div class="col-4">
                    <h5 class="text-center text-white">{{Auth::user()->name}}</h5>
                </div>    
            </div>
            <div class="row mt-1">
                <div class="col-2"></div>
                <div class="col-4">
                    <h5 class="text-center text-white">{{__('messages.level')}}</h5>
                </div> 
                <div class="col-4">
                    <h5 class="text-center text-white">{{Auth::user()->userLevel->name}}</h5>                    
                </div>    
            </div>
            <div class="row mt-1">
                <div class="col-2"></div>
                <div class="col-4">
                    <h5 class="text-center text-white">{{__('messages.point')}}</h5>
                </div> 
                <div class="col-4">
                    <h5 class="text-center text-white">{{Auth::user()->point}}</h5>                    
                </div>    
            </div>
            <div class="row mt-1">
                <div class="col-2"></div>
                <div class="col-4">
                    <h5 class="text-center text-danger">{{__('messages.win')}} {{Auth::user()->win}}</h5>
                </div> 
                <div class="col-4">
                    <h5 class="text-center text-white">{{__('messages.lose')}} {{Auth::user()->lose}}</h5>                    
                </div>    
            </div>
        </div>
    </div>
</div>
<!-- ========== Left User End ========== -->