<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts._head')
<body>

<!-- Content -->
<div id="app">
    @include('layouts._navigation')
    @yield('content')
</div>

@stack('modals')

@include('layouts._footer')
@include('layouts._scripts')
</body>
</html>
