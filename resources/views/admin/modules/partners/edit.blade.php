@extends('admin.layouts.master')

@section('pagenav', 'Изменение данных о партнёре')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading"></div>

            <div class="panel-body">
                {{ Form::model($partner, ['method' => 'PUT', 'route' => [
                    'admin.partners.update', $partner ]]) }}
                @include('admin.modules.partners.partials._form', [])

                @include('admin.partials.buttons._save')
                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop
