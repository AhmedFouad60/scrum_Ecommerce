<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<meta name="_token" content="{{ csrf_token() }}">--}}



    <title>products Page</title>

    <!-- Styles -->

    <link href="{{ asset('css/All.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    @stack('cs')

</head>

<body>

@yield('content')









<!-- Scripts -->
<script src="{{URL::to('js/All.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">
</script>
{{--<script src="{{URL::to('js/cart.js')}}"></script>--}}


@stack('js')
</body>
</html>
