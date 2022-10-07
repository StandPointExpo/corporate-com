@extends('admin.layouts.master')

@section('pagenav', 'Добавление партнёра')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading"></div>

            <div class="panel-body">
                {{ Form::model($partner, ['method' => 'POST', 'route' => 'admin.partners.store']) }}
                @include('admin.modules.partners.partials._form')

                @include('admin.partials.buttons._create')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
