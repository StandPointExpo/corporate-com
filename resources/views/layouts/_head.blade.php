<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pagename', 'StandPoint')</title>
    <meta property="og:title" content="@yield('pagename', 'StandPoint')">
    <meta property="og:site_name" content="StandPoint">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:description" content="@yield('pagename', __('main.description_title'))">
    <meta property="og:image" content="{{url('/')}}/images/icons/logo.svg">
    <meta name="facebook-domain-verification" content="pfvmp91e29x47ikhds3nzjmfuhsf9o" />
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.8"></script>
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

    <script>
        function onSubmit(token) {
            document.getElementById("feedbackForm").submit();
        }
    </script>

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('css')

</head>
