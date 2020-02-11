@extends('admin.layouts.master')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading"></div>

            <div class="panel-body">
                {{ Form::model($portfolioImage, [
                    'route' => ['admin.portfolios.store_files', $portfolio], 'method' => 'POST',
                    'files' => true ])}}
                @include('admin.modules.portfolios_images.partials._form-upload')

                @include('admin.partials.buttons._save')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
