@extends('admin.layouts.master')

@section('pagenav', 'Страницы с текстами')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
                        Добавить страницу
                    </a>
                </div>
            </div>
        </div>

        <table class="table custom-table">
            <thead>
            <tr>
                <th>Имя страницы</th>
                <th>Заголовок вкладки браузера</th>
                <th>Описание страницы</th>
                <th>Язык</th>
                <th>Текста страницы</th>
                <th></th>
            </tr>
            </thead>

            <tbody>

            @foreach ($pages as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->site_title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->language_name }}</td>
                    <td>
                        @include('admin.partials.buttons._redirect_link', [
                            'url'   => route('admin.pages_articles.index', ['page' => $item]),
                            'title' => 'Перейти к текстам'
                        ])
                    </td>
                    <td>
                        @include('admin.partials.buttons._edit_link', [
                            'target'    => '_self',
                            'url'       => route('admin.pages.edit', ['page' => $item])])
                        @include('admin.partials._destroy', [
                            'url' => route('admin.pages.destroy', ['page' => $item])])
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@stop
