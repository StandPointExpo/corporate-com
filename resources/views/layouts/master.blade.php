<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts._head')
<body>

@include('layouts._navigation')

<!-- Content -->
<div id="app">
<div>
    @yield('content')
</div>
</div>

@stack('modals')

@include('layouts._footer')
@include('layouts._scripts')
</body>
</html>
