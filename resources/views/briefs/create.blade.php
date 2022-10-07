@extends('layouts.master')

@section('content')

    <div class="brief-page d-flex align-items-start">

        <brief-create-component :contacts="{{ json_encode($contact) }}"
                                :phones="{{ json_encode($phones) }}"></brief-create-component>
    </div>

@stop
