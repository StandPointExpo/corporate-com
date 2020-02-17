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
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleFade" data-slide-to="1" class=""></li>
                                <li data-target="#carouselExampleFade" data-slide-to="2" class=""></li>
                                <li data-target="#carouselExampleFade" data-slide-to="3" class=""></li>
                                <li data-target="#carouselExampleFade" data-slide-to="4" class=""></li>
                                <li data-target="#carouselExampleFade" data-slide-to="5" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="img-item"
                                         style="background-image: url('/images/gallery/Automechanika_Frankfurt_am_Main_Germany.jpg'); background-repeat: no-repeat"></div>
                                    <div class="description-cantainer">Automechanika,<br> Frankfurt am Main, Germany
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="img-item"
                                         style="background-image: url('/images/gallery/Cevisama_Valencia_Spain.jpg'); background-repeat: no-repeat"></div>
                                    <div class="description-cantainer">Cevisama,<br> Valencia, Spain</div>
                                </div>
                                <div class="carousel-item">
                                    <div class="img-item"
                                         style="background-image: url('/images/gallery/EuroSatory_Paris_France.jpg'); background-repeat: no-repeat"></div>
                                    <div class="description-cantainer">EuroSatory,<br> Paris, France</div>
                                </div>
                                <div class="carousel-item">
                                    <div class="img-item"
                                         style="background-image: url('/images/gallery/EuroVision_2017.jpg'); background-repeat: no-repeat"></div>
                                    <div class="description-cantainer">EuroVision<br> 2017</div>
                                </div>
                                <div class="carousel-item">
                                    <div class="img-item"
                                         style="background-image: url('/images/gallery/MebelInterior_Kyiv_Ukraine.jpg'); background-repeat: no-repeat"></div>
                                    <div class="description-cantainer">MebelInterior,<br> Kyiv, Ukraine</div>
                                </div>
                                <div class="carousel-item">
                                    <div class="img-item"
                                         style="background-image: url('/images/gallery/Salone_del_Mobile_Milano_Italy.jpg'); background-repeat: no-repeat"></div>
                                    <div class="description-cantainer">Salone del Mobile,<br> Milano, Italy</div>
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
                    <div class="download-presentation-block row">
                        <div class="col d-flex justify-content-center m-3">
                            <a href="{{url('/')}}/default/StandPoint-2020.pdf" class="btn btn-outline-warning custom-btn-outline-warning mt-3" download="StandPoint-2020"> @lang('ui.download_presentation') </a>
                        </div>
                    </div>
                </div>

            </div> <!-- /container -->
            <div class="row portfolio-block pb-3">
                <div class="container">
                    <h3>@lang('ui.portfolio')</h3>
                    @include('modules.portfolios.front-portfolio')
                    <div class="row">
                        <div class="col d-flex justify-content-center m-3">
                            <a class="btn btn-outline-warning custom-btn-outline-warning mt-3" href="{{ route('portfolios') }}"> @lang('ui.more') </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row partners-block">
                <div class="container">
                    <h3> @lang('ui.our_partners')</h3>
                    @include('partials._partners')
                </div>
            </div>
        </div>
    </main>
@stop
