@extends('layouts.master')

@section('content')
    <main role="main">
        <div class="container-fluid">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron row px-0">
            <div class="container-fluid gallery-block d-flex align-items-center px-lg-4">
                <div class="gallery">
                    gallery
                </div>
                <h1 class="display-slogan">@lang('main.target_title')</h1>
            </div>
            <div class="container logo-block">
                <div class="row">
                    <div class="col-12 col-lg-5 col-md-5">
                        <img class="logo" src="/images/icons/logo.svg">
                    </div>
                    <div class="col-12 col-lg-7 col-md-7 d-flex align-items-center subslogan-block">
                        <h2>@lang('main.description_title')</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Heading</h2>
                    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                </div>
            </div>

            <hr>

        </div> <!-- /container -->

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
        </div>
    </main>
@stop
