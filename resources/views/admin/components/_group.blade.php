@if (isset($el) && is_string($el))
    <div class="form-group{{ $errors->has($el) ? ' has-error' : '' }}">
        {{ $slot }}
        @include('admin.partials._validation', compact('el'))
    </div>
@endif
