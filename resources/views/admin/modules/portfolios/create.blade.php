@extends('admin.layouts.master')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading"></div>

            <div class="panel-body">
                {{ Form::model($portfolio, ['method' => 'POST', 'route' => 'admin.portfolios.store']) }}
                @include('admin.modules.portfolios.partials._form')

                @include('admin.partials.buttons._create')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
