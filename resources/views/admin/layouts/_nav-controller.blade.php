@if (isset($item['children']) && count($item['children']))
    @include('admin.layouts._nav-category', ['item' => $item])
@else
    @include('admin.layouts._nav-item', ['item' => $item])
@endif
