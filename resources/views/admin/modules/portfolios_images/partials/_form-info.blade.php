@component('admin.components._group', ['el' => 'title'])
    {{ Form::label('title', 'Название') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
@endcomponent

@component('admin.components._group', ['el' => 'description'])
    {{ Form::label('description', 'Описание') }}
    {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) }}
@endcomponent
