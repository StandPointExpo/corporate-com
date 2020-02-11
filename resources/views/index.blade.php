@extends('layouts.master')

@section('content')
    <h1>@lang('main.target_title')</h1>

    <h2>@lang('main.description_title')</h2>

    @foreach(optional($pageText)->articles ?? [] as $article)
            @if($article->name == \App\Article::TEXT_FIRST)
                <p>
                    {{ $article->text }}
                </p>
            @endif
    @endforeach

    <h3>@lang('ui.portfolio')</h3>
    <p>
        @include('modules.portfolios.preview')

        <a href="{{ route('portfolios') }}">@lang('ui.more')</a>
    </p>

    @lang('ui.our_partners')
    <p>
        @include('partials._partners')
    </p>

    @lang('ui.send_us')
    <p>
        @include('partials._form-mail')
    </p>
@stop
