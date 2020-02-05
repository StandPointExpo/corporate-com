@extends('admin.layouts.master')

@section('pagename', 'Контакты')

@section('content')

    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            {{ Form::open(['url' => route('admin.contacts.update', $contact), 'method' => 'PUT']) }}
                <div class="form-group">
                    @component('admin.components._group', ['el' => 'name'])
                        {{ Form::label('name', 'Имя') }}
                        {{ Form::text('name', $contact->name, ['readonly', 'class' => 'form-control', 'id' => 'name']) }}
                    @endcomponent

                    @component('admin.components._group', ['el' => 'email'])
                        {{ Form::label('email', 'Почта компании') }}
                        {{ Form::text('email', $contact->email, ['class' => 'form-control', 'id' => 'email']) }}
                    @endcomponent

                    @component('admin.components._group', ['el' => 'phone'])
                        {{ Form::label('phone', 'Номер телефона компании') }}
                        {{ Form::text('phone', $contact->phone, ['class' => 'form-control', 'id' => 'phone']) }}
                    @endcomponent

                    @component('admin.components._group', ['el' => 'address'])
                        {{ Form::label('address', 'Адрес компании') }}
                        {{ Form::textarea('address', $contact->address, ['class' => 'form-control', 'id' => 'address']) }}
                    @endcomponent
                </div>

            @include('admin.partials.buttons._save')
            {{ Form::close() }}
        </div>
    </div>

@stop
