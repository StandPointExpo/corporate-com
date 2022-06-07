<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="facebook-domain-verification" content="pfvmp91e29x47ikhds3nzjmfuhsf9o" />
@include('layouts._head')
<body>

<!-- Content -->
<div id="app">
    @include('layouts._navigation')
    @yield('content')


    @include('layouts._footer')
</div>
@stack('modals')
@include('layouts._scripts')
</body>
</html>
