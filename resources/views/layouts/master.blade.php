<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
<!-- Core Scripts -->
<script type="text/javascript" src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
