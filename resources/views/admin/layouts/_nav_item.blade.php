<li class="px-nav-item{{
    (\Illuminate\Support\Facades\Route::currentRouteName() === $item['route'])
        ? ' active'
        : ''
}}">
    <a href="{{ route($item['route']) }}">
        <i class="px-nav-icon {{ $item['icon'] }}"></i>
        <span class="px-nav-label">
            @if(isset($item['badge_content']))
                <span class="badge badge-danger" id="{{ $item['badge_id'] ?? '' }}" style="{{ !$item['badge_content'] ? 'display: none;' : '' }}"> {{ $item['badge_content'] }}</span>
            @endif
            {{ $item['title'] }}
        </span>
    </a>
</li>
