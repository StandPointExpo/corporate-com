@if (isset($el) && is_string($el))
    <div class="form-group{{ $errors->has($el) ? ' has-error' : '' }}"
    @if (isset($id) && is_string($id))
        id="{{$id}}"
    @endif
    >
        {{ $slot }}
        @include('admin.partials._validation', compact('el'))
    </div>
@endif
