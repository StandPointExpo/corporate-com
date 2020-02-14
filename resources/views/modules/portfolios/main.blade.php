@foreach(($portfolios ?? []) as $portfolio)
    {{-- инфо при наведении--}}
    {{ $portfolio->title     ?? '' }}
    {{ $portfolio->client    ?? '' }}
    <img src="{{ $portfolio->main_image_preview }}" alt="{{ $portfolio->description }}">

     вложенные изображения
     @foreach($portfolio->images ?? [] as $portfolioImage)
     <img src="{{ $portfolioImage->large_url }}" alt="large">
     @endforeach

     либо линк на роут конкретного портфолио
     <a href="{{ route('show_images', $portfolio) }}">
        <img src="{{ $portfolio->main_image_preview }}" alt="{{ $portfolio->description }}">
     </a>
@endforeach
