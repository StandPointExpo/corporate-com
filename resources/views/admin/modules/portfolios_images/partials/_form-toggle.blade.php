
@component('admin.components._group', ['el' => 'is_main'])
    <div class="form-control">
        {{ Form::checkbox('is_main', 1, $status, [ 'id' => 'is_main']) }}
        {{ Form::label('is_main', 'Сделать обложкой') }}
    </div>
@endcomponent
