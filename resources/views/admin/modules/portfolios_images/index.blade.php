@extends('admin.layouts.master')

@section('pagenav', "$portfolio->title")

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-2 text-left">
                    <a href="{{asset(route('admin.portfolios.index'))}}" class="btn btn-default">
                        <i class="fas fa-arrow-circle-left"></i> Вернуться к списку портфолио
                    </a>
                </div>
                <div class="col-md-10 text-right">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('admin.portfolios.images.create', compact('portfolio')) }}" class="btn btn-primary">
                            Добавить изображения
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <table class="table custom-table">
            <thead>
            <tr>
                <th>Изображение</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Обложка портфолио</th>
                <th></th>
            </tr>
            </thead>

            <tbody>

            @foreach ($images as $item)
                <tr>
                    <td><img src="{{ $item->admin_preview_url }}" alt=""></td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{!! $item->is_main ? "<i class='fas fa-check-circle'></i>" : '' !!} </td>
                    <td>
                        @include('admin.partials.buttons._edit_link', [
                            'target'    => '_self',
                            'url'       => route('admin.portfolios.images.edit', [
                                'portfolio' => $portfolio,
                                'image'     => $item])
                            ])
                        @include('admin.partials._destroy', [
                            'url' => route('admin.portfolios.images.destroy', [
                                'portfolio' => $portfolio,
                                'image'     => $item])
                            ])
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@stop
