@extends('admin.layouts.master')

@section('pagenav', "Добавление текста для страницы:  $page->name")

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading"></div>

            <div class="panel-body">
                {{ Form::model($article, ['method' => 'POST', 'route' => ['admin.pages_articles.store', $page]]) }}
                @include('admin.modules.pages_articles.partials._form')

                @include('admin.partials.buttons._create')
                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop
