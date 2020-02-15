<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 box-portfolio">
    @foreach($frontPortfolios ?? [] as $previewPortfolio)
        <div class="col mb-4 mt-1 project-item">
                @foreach($previewPortfolio->images as $portfolioImage)
                    @if($loop->first)
                        <a href="{{ $portfolioImage->large_url }}" data-lightbox="example-set-{{$previewPortfolio->id}}" data-title="{{$previewPortfolio->title}}" class="more portfolig-g-bg">
                            <div class="project-info">
                                <img src="{{ $portfolioImage->preview_url }}" alt="preview" class="preview">
                                <div class="project-details">
                                    <h5 class="white-text red-border-bottom">{{$previewPortfolio->title}}</h5>
                                    <div class="details white-text">{{$previewPortfolio->description}}</div>
                                </div>
                            </div>
                        </a>
                    @else
                    <a href="{{ $portfolioImage->large_url }}" data-lightbox="example-set-{{$previewPortfolio->id}}" data-title="{{$previewPortfolio->title}}" class="more portfolig-g-bg" style="display: none"></a>
                    @endif
                @endforeach
        </div>
    @endforeach
</div>
