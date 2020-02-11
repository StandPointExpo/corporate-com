@extends('admin.layouts.master')

@section('pagenav', 'Данные о партнёрах')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">
                        Добавить партнёра
                    </a>
                </div>
            </div>
        </div>

        <table class="table custom-table">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Ссылка</th>
                <th></th>
            </tr>
            </thead>

            <tbody>

            @foreach ($partners as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ $item->link }}" target="_blank">{{ $item->free_link }}</a>
                    </td>
                    <td>
                        @include('admin.partials.buttons._edit-link', [
                            'target'    => '_self',
                            'url'       => route('admin.partners.edit', ['partner' => $item])])
                        @include('admin.partials._destroy', [
                            'url' => route('admin.partners.destroy', ['partner' => $item])])
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@stop
