<!-- Vendor js -->
<script src="{{ URL::asset('assets/js/vendor.min.js') }}"></script>
<!-- App js -->
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

<!-- Include Parsley.js JS -->
<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
<script src="{{ URL::asset('/assets/js/form-validation.init.js') }}"></script>

<!-- Range slider -->
<script src="{{ URL::asset('assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>

<!-- custom js -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

@yield('script')
        