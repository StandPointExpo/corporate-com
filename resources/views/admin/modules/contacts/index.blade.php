@extends('admin.layouts.master')

@section('pagenav', 'Контакты компании')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">
                        Добавить контакт
                    </a>
                </div>
            </div>
        </div>

        <table class="table custom-table">
            <thead>
            <tr>
                <th>Имя страницы</th>
                <th>Язык</th>
                <th></th>
            </tr>
            </thead>

            <tbody>

            @foreach ($contacts as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ optional($item->language)->name }}</td>
                    <td>
                        @include('admin.partials.buttons._edit-link', [
                            'target'    => '_self',
                            'url'       => route('admin.contacts.edit', ['contact' => $item])])
                        @include('admin.partials._destroy', [
                            'url' => route('admin.contacts.destroy', ['contact' => $item])])
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
<script>

</script>
@stop
