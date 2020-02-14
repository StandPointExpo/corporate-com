@foreach($images ?? [] as $image)
    <img src="{{ $image->large_url }}" alt="">

@endforeach
