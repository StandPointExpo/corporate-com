@extends('layouts.master')

@section('content')
    <h1>Hello World</h1>
    @foreach($previewPortfolios as $previewPortfolio)

        <img src="{{ $previewPortfolio->main_image_preview }}" alt="">
{{--        @foreach($previewPortfolio->images as $portfolioImage)--}}
{{--            <img src="{{ $portfolioImage->preview_url }}" alt="preview">--}}
{{--            <img src="{{ $portfolioImage->large_url }}" alt="large">--}}
{{--        @endforeach--}}
    @endforeach
    @include('partials._form_mail')
@stop
