<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pagename', 'standpoint.com.ua')</title>
    <meta property="og:title" content="@yield('pagename', 'standpoint.com.ua')">
    <meta property="og:site_name" content="StandPoint">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:description" content="@yield('pagename', __('main.description_title'))">
    <meta property="og:image" content="{{url('/')}}/images/icons/logo.svg">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=cyrillic" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158589039-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-158589039-1');
    </script>


    <!-- Core Scripts -->
    <script src="{{ asset('js/app.js') }}?version=0.5v" defer></script>

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}?version=0.5v">
    @stack('css')

</head>
