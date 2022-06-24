<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'Laravel')}}@yield('title')</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/APlayer.min.css')}}">

    <!-- Script -->
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{asset('js/mdui.js')}}"></script>
    <script src="{{asset('js/APlayer.min.js')}}"></script>
    <script src="{{asset('js/Meting.min.js')}}"></script>
</head>
