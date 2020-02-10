
@foreach($partners as $partner)
    <a href="{{ $partner->link }}">    {{ $partner->name }}</a>
@endforeach
