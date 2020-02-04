@component('admin.components._group', ['el' => 'title'])
    {{ Form::label('title', 'Название') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
@endcomponent

@component('admin.components._group', ['el' => 'client'])
    {{ Form::label('client', 'Клиент') }}
    {{ Form::text('client', null, ['class' => 'form-control', 'id' => 'client']) }}
@endcomponent

@component('admin.components._group', ['el' => 'description'])
    {{ Form::label('description', 'Описание') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) }}
@endcomponent

{{--@component('admin.components._group', ['el' => 'file'])--}}
{{--    {{ Form::label('file', 'Файл') }}--}}
{{--    {{ Form::file('file', ['class' => 'form-control', 'id' => 'file']) }}--}}
{{--@endcomponent--}}
