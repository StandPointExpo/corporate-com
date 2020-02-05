@component('admin.components._group', ['el' => 'name'])
    {{ Form::label('name', 'Имя партнёра') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
@endcomponent

@component('admin.components._group', ['el' => 'link'])
    {{ Form::label('link', 'Ссылка на партнёра') }}
    {{ Form::text('link', "http://$partner->free_link", ['class' => 'form-control', 'id' => 'link']) }}
@endcomponent
