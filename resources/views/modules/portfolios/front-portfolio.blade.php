@foreach($frontPortfolios ?? [] as $previewPortfolio)
    @foreach($previewPortfolio->images as $portfolioImage)
        @if($loop->first)
            <a href="{{ $portfolioImage->large_url }}" data-lightbox="example-set-998" data-title="Zegor" class="more portfolig-g-bg">
                <div class="project-info">
                    <div class="project-details">
                        <h5 class="white-text red-border-bottom">Zegor</h5>
                        <div class="details white-text">StandPoint </div>
                        <img src="{{ $portfolioImage->preview_url }}" alt="preview">
                    </div>
                </div>
            </a>
        @else
            <a href="{{ $portfolioImage->large_url }}" data-lightbox="example-set-998" data-title="Zegor" class="more portfolig-g-bg"></a>
        @endif
    @endforeach
@endforeach