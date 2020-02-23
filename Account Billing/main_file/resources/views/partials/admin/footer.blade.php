<script src="{{ asset('assets/modules/jquery.min.js') }} "></script>
<script src="{{ asset('assets/modules/popper.js') }} "></script>
<script src="{{ asset('assets/modules/tooltip.js') }} "></script>
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }} "></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }} "></script>
<script src="{{ asset('assets/modules/moment.min.js') }} "></script>
<script src="{{ asset('assets/js/stisla.js') }} "></script>

<script src="{{ asset('assets/modules/jquery.sparkline.min.js') }} "></script>

<script src="{{ asset('assets/modules/chart/Chart.min.js') }} "></script>
<script src="{{ asset('assets/modules/chart/Chart.extension.js') }} "></script>


<script src="{{ asset('assets/modules/datatables/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/modules/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/modules/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/modules/bootstrap-toastr/ui-toastr.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }} "></script>

<script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }} "></script>
<script src="{{ asset('assets/js/jquery.easy-autocomplete.min.js') }}"></script>

<script src="{{ asset('assets/js/jscolor.js') }} "></script>
<script src="{{ asset('assets/js/scripts.js') }} "></script>
<script src="{{ asset('assets/js/custom.js') }} "></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script>

</script>

@if ($message = Session::get('success'))
    <script>
        toastrs('Success', '{!! $message !!}', 'success')
    </script>
@endif

@if ($message = Session::get('error'))
    <script>toastrs('Error', '{!! $message !!}', 'error')</script>
@endif

@if ($message = Session::get('info'))
    <script>toastrs('Info', '{!! $message !!}', 'info')</script>
@endif

@stack('script-page')
