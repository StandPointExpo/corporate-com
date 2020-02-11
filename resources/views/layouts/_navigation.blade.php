@foreach([
            trans('ui.main')        => route('main'),
            trans('ui.portfolio')   => route('portfolios'),
            trans('ui.contacts')    => route('contacts') ] as $name => $route)
    <a href="{{ $route }}">{{ $name }}</a>
@endforeach
{{ \App\Contact::getNumber() ?? '' }}
@include('layouts._nav-language')
