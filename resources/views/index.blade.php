@extends('layouts.master')
@section('pagename', $pageText->site_title ?? '' )
@section('content')
    <main role="main">
        <div class="container-fluid front-content">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron row px-0">
            <div class="container-fluid gallery-block d-flex align-items-center px-lg-4">
                <div class="gallery">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="img-item" style="background-image: url(/images/gallery/item-1_02.jpg); background-repeat: no-repeat"></div>
                                <div class="description-cantainer">Automechanika<br>
                                    Frankfurt am Mein, Germany</div>
                            </div>
                            <div class="carousel-item">
                                <div class="img-item" style="background-image: url(/images/gallery/item-2_02.jpg); background-repeat: no-repeat"></div>
                                <div class="description-cantainer">Salone del Mobile<br>
                                    Milano, Italy</div>
                            </div>
                            <div class="carousel-item">
                                <div class="img-item" style="background-image: url(/images/gallery/item-3_02.jpg); background-repeat: no-repeat"></div>
                                <div class="description-cantainer">Salone del Mobile<br>
                                    Milano, Italy</div>
                            </div>

                        </div>
                    </div>
                </div>
                <h1 class="display-slogan">@lang('main.target_title')</h1>
            </div>
            <div class="container-fluid logo-block">
                <div class="row">
                    <div class="col-12 col-lg-5 col-md-5">
                        <img class="logo" src="/images/icons/logo.svg">
                    </div>
                    <div class="col-12 col-lg-7 col-md-7 d-flex subslogan-block justify-content-md-end">
                        <h2 class="justify-content-sm-center">@lang('main.description_title')</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Example row of columns -->
            <div class="container description-company">
                    @foreach(optional($pageText)->articles ?? [] as $article)
                        @if($article->name == \App\Article::TEXT_FIRST)
                           {!! $article->text !!}
                        @endif
                    @endforeach
            </div>

        </div> <!-- /container -->
<div class="row portfolio-block">
    <div class="container">
        <h3>@lang('ui.portfolio')</h3>
        <p>
            @include('modules.portfolios.preview')

            <a href="{{ route('portfolios') }}">@lang('ui.more')</a>
        </p>
    </div>
</div>

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
