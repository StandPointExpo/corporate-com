@extends('layouts.master')

@section('content')

    <h2>@lang('main.description_title')</h2>

    <p>
        @include('modules.portfolios.main', ['portfolios' => $portfolios])
    </p>
@stop
