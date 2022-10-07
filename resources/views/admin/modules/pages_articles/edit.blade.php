@extends('admin.layouts.master')

@section('pagenav', "Добавление текста для страницы:  $page->name")

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">

            <div class="panel-heading"></div>

            <div class="panel-body">
                {{ Form::model($article, ['method' => 'PUT', 'route' => [
                    'admin.pages_articles.update',  $page,$article ]])
                }}
                @include('admin.modules.pages_articles.partials._form')

                @include('admin.partials.buttons._save')
                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop
