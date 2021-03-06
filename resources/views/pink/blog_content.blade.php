<div id="content-blog" class="content group">
@if ($articles)

    @foreach($articles as $article)
    <div class="sticky hentry hentry-post blog-big group">
        <!-- post featured & title -->
        <div class="thumbnail">
            <!-- post title -->
            <h2 class="post-title"><a href="{{ route('article.show', ['alias' => $article->alias]) }}">{{ $article->title }}</a></h2>
            <!-- post featured -->
            <div class="image-wrap">
                @if ($article->img)
                <img src="{{ asset(env('THEME')) }}/images/articles/{{ $article->img->max }}" alt="001" />
                @endif
            </div>
            <p class="date">
                <span class="month">{{ $article->created_at->format('M') }}</span>
                <span class="day">{{ $article->created_at->format('d') }}</span>
            </p>
        </div>
        <!-- post meta -->
        <div class="meta group">
            <p class="author"><span>by <a rel="author">{{ $article->user->name }}</a></span></p>
            <p class="categories"><span>In: <a href="{{ route('articles_cat', ['alias' => $article->category->alias ])  }}" title="Посмотреть все статьи в {{ $article->category->title }}" rel="category tag">{{ $article->category->title }}</a></span></p>
            <p class="comments"><span><a href="{{ route('article.show', ['alias' => $article->alias]) }}#respond" title="{{ $article->title }}">{{ count($article->comments) ? count($article->comments) : '0' }} {{ Lang::choice('site.comments', count($article->comments)) }}</a></span></p>
        </div>
        <!-- post content -->
        <div class="the-content group">
            {!! $article->description  !!}
            <p><a href="{{ route('article.show', ['alias' => $article->alias]) }}" class="btn   btn-beetle-bus-goes-jamba-juice-4 btn-more-link">→ {{ trans('site.read_more') }}</a></p>
        </div>
        <div class="clear"></div>
    </div>
    @endforeach

    <div class="general-pagination group">
        @if($articles->lastPage() > 1)

            @if ($articles->currentPage() !== 1)
                <a href="{{ $articles->url($articles->currentPage() - 1) }}">&lsaquo;</a>
            @endif

            @for ($i = 1; $i <= $articles->lastPage(); $i++)
                @if($articles->currentPage() == $i)
                    <a class="selected">{{ $i }}</a>
                @else
                    <a href="{{ $articles->url($i) }}">{{ $i }}</a>
                @endif
            @endfor

            @if ($articles->currentPage() !== $articles->lastPage())
                <a href="{{ $articles->url($articles->currentPage() + 1) }}">&rsaquo;</a>
            @endif

        @endif
    </div>

@else
    <h2>{{ trans('site.articles_no') }}</h2>


@endif
</div>