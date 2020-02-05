
@component('admin.components._group', ['el' => 'is_main'])
    <div class="checkbox">
        <label>
            {{ Form::checkbox('is_main', 1, $status) }}
            Сделать обложкой
        </label>
    </div>
@endcomponent
