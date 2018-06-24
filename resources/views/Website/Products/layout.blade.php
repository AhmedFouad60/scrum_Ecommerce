<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>products Page</title>

    <!-- Styles -->

    <link href="{{ asset('css/All.css') }}" rel="stylesheet">
    @stack('cs')

</head>

<body>

@yield('content')









<!-- Scripts -->
<script src="{{URL::to('js/All.js')}}"></script>
@stack('js')
</body>
</html>
