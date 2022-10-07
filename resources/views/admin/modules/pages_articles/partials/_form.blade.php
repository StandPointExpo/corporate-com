@component('admin.components._group', ['el' => 'page'])
    {{ Form::label('page', 'Имя страницы') }}
    {{ Form::text('page', $page->name, ['readonly', 'class' => 'form-control', 'id' => 'page']) }}
@endcomponent

@component('admin.components._group', ['el' => 'language_id'])
    {{ Form::label('language_id', 'Язык страницы') }}
    {{ Form::text('language_id', $page->language_name, ['readonly', 'class' => 'form-control', 'id' => 'language_id']) }}
@endcomponent

@component('admin.components._group', ['el' => 'name'])
    {{ Form::label('name', 'Имя текста для Базы Данных') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'first-text, second-text, third-text, fourth-text, fifth-text, etc.']) }}
@endcomponent

@component('admin.components._group', ['el' => 'text'])
    {{ Form::label('text', 'Отображаемый текст') }}
    {{ Form::textarea('text', null, ['class' => 'form-control', 'id' => 'text']) }}
@endcomponent

