@extends('admin.layouts.master')

@section('pagenav', 'Изменить данные изображения')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">

            <img src="{{ $image->admin_large_url }}" class="img-responsive center-block">

            <div class="panel-body">
                {{ Form::model($image, ['method' => 'PUT', 'route' => [
                    'admin.portfolios.images.update', $portfolio,$image ]])
                }}
                @include('admin.modules.portfolios_images.partials._form-info')
                @if(!$image->is_main)
                    @include('admin.modules.portfolios_images.partials._form-toggle',[
                          'status' => $image->is_main
                    ])
                @endif
                @include('admin.partials.buttons._save')
                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop
