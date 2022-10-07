@extends('layouts.master')

@section('content')
    <div class="container portfolio-page mb-5">
        <div class="row portfolio-header">
            <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center my-1"><img class="logo" src="/images/icons/logo.svg"></div>
            <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center my-1"><p class="portfolio-slogan">@lang('main.description_title')</p></div>
        </div>
        @include('modules.portfolios.main', ['portfolios' => $portfolios])
    </div>
@stop
