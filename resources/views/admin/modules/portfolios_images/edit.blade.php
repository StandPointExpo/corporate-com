@extends('admin.layouts.master')

@section('pagenav', 'Изменить данные изображения')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading"></div>

            <div class="panel-body">
                {{ Form::model($image, ['method' => 'PUT', 'route' => [
                    'admin.portfolios.images.update', $portfolio,$image ]]) }}
                @include('admin.modules.portfolios_images.partials._form_info')

                @include('admin.partials.buttons._save')
                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop
