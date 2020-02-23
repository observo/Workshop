<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css')}} ">

    <link href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css')}} ">

</head>

<body>
<div id="app">
    @yield('content')
</div>

<!-- General JS Scripts -->
<script src="{{ asset('assets/modules/jquery.min.js')}} "></script>
<script src="{{ asset('assets/modules/popper.js')}} "></script>
<script src="{{ asset('assets/modules/tooltip.js')}} "></script>
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js')}} "></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}} "></script>
<script src="{{ asset('assets/modules/moment.min.js')}} "></script>
<script src="{{ asset('assets/js/stisla.js')}} "></script>

<script src="{{ asset('assets/modules/datatables/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/modules/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }} "></script>
<script src="{{ asset('assets/js/scripts.js')}} "></script>
<script src="{{ asset('assets/js/custom.js')}} "></script>
</body>
</html>
