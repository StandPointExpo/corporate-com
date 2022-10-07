@extends('admin.layouts.master')

@section('pagenav', 'Изменить портфолио')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading"></div>

            <div class="panel-body">
                {{ Form::model($portfolio, ['method' => 'PUT', 'route' => [
                    'admin.portfolios.update', $portfolio ]]) }}
                @include('admin.modules.portfolios.partials._form')

                @include('admin.partials.buttons._save')
                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop
