@auth
    <script>
        window.auth_user_id = {{ Auth::id() }};
    </script>
@endauth
@stack('vue')
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

@stack('js')
