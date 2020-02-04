<!DOCTYPE html>
<html>
@include('admin.layouts._head')
<body>

@include('admin.layouts._navigation')

<!-- Content -->
<div class="content" id="app">
    <div class="page-header">
    </div>

    <div>
        @yield('content')
    </div>
</div>

@stack('modals')

@include('admin.layouts._footer')
@include('admin.layouts._scripts')
@include('admin.layouts._alerts')
</body>
</html>
