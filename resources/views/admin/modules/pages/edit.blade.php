@extends('admin.layouts.master')

@section('pagenav', 'Изменить данные страницы')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading"></div>

            <div class="panel-body">
                {{ Form::model($page, ['method' => 'PUT', 'route' => ['admin.pages.update', $page ]]) }}
                @include('admin.modules.pages.partials._form', [])

                @include('admin.partials.buttons._save')
                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop
