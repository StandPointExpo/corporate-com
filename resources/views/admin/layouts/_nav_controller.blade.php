@if (isset($item['children']) && count($item['children']))
    @include('admin.layouts._nav_category', ['item' => $item])
@else
    @include('admin.layouts._nav_item', ['item' => $item])
@endif
