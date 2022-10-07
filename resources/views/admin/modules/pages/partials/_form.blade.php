@component('admin.components._group', ['el' => 'name'])
    {{ Form::label('name', 'Имя страницы для Базы Данных') }}
    {{ Form::text('name', null, ['placeholder' => 'main-page, contact-page, portfolio-page','class' => 'form-control', 'id' => 'name']) }}
@endcomponent

@component('admin.components._group', ['el' => 'site_title'])
    {{ Form::label('site_title', 'Отображаемый заголовок страницы во вкладке браузера') }}
    {{ Form::text('site_title', null, ['class' => 'form-control', 'id' => 'site_title']) }}
@endcomponent

@component('admin.components._group', ['el' => 'description'])
    {{ Form::label('description', 'Описание страницы') }}
    {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) }}
@endcomponent

@component('admin.components._group', ['el' => 'language_id'])
    {{ Form::label('language_id', 'Язык страницы') }}
    {{ Form::select('language_id', \App\Language::languages(), null, ['class' => 'form-control', 'id' => 'language_id']) }}
@endcomponent

