<div id="content-page" class="content group">
    <div class="hentry group">
        <div id="portfolio" class="portfolio-big-image">

         @foreach ($portfolios as $portfolio)
            <div class="hentry work group">
                <div class="work-thumbnail">
                    <div class="nozoom">
                        <img src="{{ asset(env('THEME')) }}/images/projects/{{ $portfolio->img->max }}" alt="{{ $portfolio->img->max }}" />
                        <div class="overlay">
                            <a class="overlay_img" href="{{ asset(env('THEME')) }}/images/projects/{{ $portfolio->img->path }}" rel="lightbox" title="{{ $portfolio->title }}"></a>
                            <a class="overlay_project" href="{{ route('portfolio.show', ['alias' => $portfolio->alias]) }}"></a>
                            <span class="overlay_title">{{ $portfolio->title }}</span>
                        </div>
                    </div>
                </div>
                <div class="work-description">
                    <h3>{{ $portfolio->title }}</h3>
                    {!! str_limit($portfolio->text, 350) !!}
                    <div class="clear"></div>
                    <div class="work-skillsdate">
                        <p class="customer"><span class="label">Customer:</span> {{ $portfolio->customer }}</p>
                    </div>
                    <a class="read-more" href="{{ route('portfolio.show', ['alias' => $portfolio->alias]) }}">{{ trans('site.view_project') }}</a>
                </div>
                <div class="clear"></div>
            </div>
            @endforeach

            </div>
        </div>
        <div class="clear"></div>
    </div>

<div class="general-pagination group">
    @if($portfolios->lastPage() > 1)

        @if ($portfolios->currentPage() !== 1)
            <a href="{{ $portfolios->url($portfolios->currentPage() - 1) }}">&lsaquo;</a>
        @endif

        @for ($i = 1; $i <= $portfolios->lastPage(); $i++)
            @if($portfolios->currentPage() == $i)
                <a class="selected">{{ $i }}</a>
            @else
                <a href="{{ $portfolios->url($i) }}">{{ $i }}</a>
            @endif
        @endfor

        @if ($portfolios->currentPage() !== $portfolios->lastPage())
            <a href="{{ $portfolios->url($portfolios->currentPage() + 1) }}">&rsaquo;</a>
        @endif

    @endif
</div>
</div>