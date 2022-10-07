<ul class="px-nav-content">
    @foreach (config('admin_nav') as $item)
        @include('admin.layouts._nav-controller', ['item' => $item])
    @endforeach
    <li class="px-nav-item">
        <a href="{{ route('logout') }}" id="logout-link">
            <i class="px-nav-icon fa fa-sign-out-alt"></i>
            <span class="px-nav-label">
                    LOGOUT
            </span>
            <form class="hidden form-confirm" action="{{ route('logout') }}" method="POST" data-confirm="Вы уверены?">
                {{ csrf_field() }}
            </form>
        </a>
    </li>
</ul>
@push('js')
    <script>
        $(function () {
            if (!$('#logout-link').length) {
                return false;
            }

            $('#logout-link').bind('click', function (event) {
                event.preventDefault();
                $(this).closest('li').find('form').submit();
            });
        });
    </script>
@endpush
