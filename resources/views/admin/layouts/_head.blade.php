<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pagename', 'Standpoint Corporate Admin')</title>

    <link rel="icon" href="{{ asset('') }}">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
    <link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">

    <!-- Core stylesheets -->
    <link href=" {{ asset('pixeladmin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('pixeladmin/css/pixeladmin.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('pixeladmin/css/widgets.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Theme -->
    <link href="{{ asset('pixeladmin/css/themes/clean.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('pixeladmin/css/custom.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('pixeladmin/fontawesome/css/fontawesome-all.min.css') }}" rel="stylesheet" type="text/css">
    @stack('css')
</head>
