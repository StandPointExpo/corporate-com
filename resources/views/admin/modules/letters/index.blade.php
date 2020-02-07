@extends('admin.layouts.master')

@section('pagenav', 'Полученные письма')

@section('content')
    <div class="panel">

        <table class="table custom-table">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Електронный адрес</th>
                <th>Тема</th>
                <th>Текст письма</th>
                <th></th>
            </tr>
            </thead>

            <tbody>

            @foreach ($letters as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->subject }}</td>
                    <td>{{ $item->message }}</td>
                    <td>
                        @include('admin.partials._destroy', [
                            'url' => route('admin.letters.destroy', ['letter' => $item])])
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@stop
