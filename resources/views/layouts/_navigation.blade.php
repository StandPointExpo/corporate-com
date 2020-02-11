@foreach([ trans('ui.main'), trans('ui.portfolio'), trans('ui.contacts')] as $nav)
    <a href="#">{{ $nav }}</a>
@endforeach
{{ \App\Contact::getNumber() ?? '' }}
@include('layouts._nav-language')
