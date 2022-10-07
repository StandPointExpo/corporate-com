@extends('admin.layouts.master')

@section('pagenav', 'Создание страницы')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading"></div>

            <div class="panel-body">
                {{ Form::model($page, ['method' => 'POST', 'route' => 'admin.pages.store']) }}
                @include('admin.modules.pages.partials._form')

                @include('admin.partials.buttons._create')
                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop
