@auth
    <script>
        window.auth_user_id = {{ Auth::id() }};
    </script>
@endauth
@stack('vue')
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="{{ asset('pixeladmin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('pixeladmin/js/pixeladmin.min.js') }}"></script>
<script src="{{ asset('pixeladmin/js/app.js') }}"></script>
<script src="{{ asset('pixeladmin/js/common.js') }}"></script>
@stack('js')
