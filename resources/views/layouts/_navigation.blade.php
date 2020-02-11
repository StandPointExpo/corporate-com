

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                @foreach([
            trans('ui.main')        => route('main'),
            trans('ui.portfolio')   => route('portfolios'),
            trans('ui.contacts')    => route('contacts') ] as $name => $route)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $route }}">{{ $name }}</a>
                    </li>
                @endforeach
            </ul>
            <form class="form-inline my-2 my-lg-0">
                @include('layouts._nav-language')
            </form>
        </div>
    </div>
</nav>
{{ \App\Contact::getNumber() ?? '' }}

