@extends('admin.layouts.master')

@section('pagenav', $page->name . '/' . $page->language_name)

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-12 text-right">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('admin.pages_articles.create', compact('page')) }}" class="btn btn-primary">
                            Добавить текст
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <table class="table custom-table">
            <thead>
            <tr>
                <th>Имя используемое базой данных</th>
                <th>Текст</th>
                <th>Язык</th>
                <th></th>
            </tr>
            </thead>

            <tbody>

            @foreach ($articles as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->text }}</td>
                    <td>{{ $page->language_name }}</td>
                    <td>
                        @include('admin.partials.buttons._edit_link', [
                            'target'    => '_self',
                            'url'       => route('admin.pages_articles.edit', [
                                'page'      => $page,
                                'article'   => $item])
                             ])
                        @include('admin.partials._destroy', [
                            'url' => route('admin.pages_articles.destroy', [ 'page' => $page, 'article' => $item])])
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@stop
