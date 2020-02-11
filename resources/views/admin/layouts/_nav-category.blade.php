<li class="px-nav-item px-nav-dropdown">
    <a href="#">
        <i class="px-nav-icon {{ $item['icon'] }}"></i>
        <span class="px-nav-label">
            {!! $item['title'] !!}
            @if(isset($item['badge_content']))
                <span class="badge badge-danger" id="{{ $item['badge_id'] ?? '' }}" style="{{ !$item['badge_content'] ? 'display: none;' : '' }}"> {{ $item['badge_content'] }}</span>
            @endif
        </span>
    </a>

    <ul class="px-nav-dropdown-menu" style="">
        @foreach ($item['children'] as $subitem)
            @include('admin.layouts._nav-controller', ['item' => $subitem])
        @endforeach
    </ul>
</li>
