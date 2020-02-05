@if (isset($url) && is_string($url))
    <a href="{{ $url }}" target="_blank" class="{{ isset($class) && is_string($class) ? $class : 'btn btn-primary btn-sm' }}"
       title="{{ isset($title) && is_string($title) ? $title : 'Перейти к контенту' }}">
        @if (isset($content) && is_string($content))
            {!! $content !!}
        @else
            <i class="fa fa-folder-open"></i>
        @endif
    </a>
@endif
