@extends('layouts.master')

@section('content')
    <h1>@lang('ui.contacts')</h1>
    <p>
        @lang('contacts.address')
    </p>
    <p>
        @lang('contacts.telephone_fax') {{ $contacts->phone }}
    </p>
    <p>
        @lang('contacts.e-mail'): {{ $contacts->email }}
    </p>

    <p>
        @lang('contacts.address_landmark')
    </p>

    @include('partials._map', ['coordinates' => ''])

@stop
