@if ($comments)
    <div id="sidebar-blog-sidebar" class="sidebar group">
        <div class="widget-last widget recent-comments">
            <h3>{{ trans('site.recent_comments') }}</h3>
            <div class="recent-post recent-comments group">

                @foreach($comments as $comment)
                    <div class="the-post group">
                        <div class="avatar">
                            <img alt="" src="{{ asset(env('THEME')) }}/images/avatar/unknow55.png" class="avatar" />
                        </div>
                        <span class="author"><strong><a href="#">{{ isset($comment->user) ? $comment->user->name : $comment->name }}</a></strong> in</span>
                        <a class="title" href="{{ route('article.show', ['alias' => $comment->article->alias]) }}">{{ $comment->article->title }}</a>
                        <p class="comment">
                            {{ $comment->text }}
                            <a class="goto" href="{{ route('article.show', ['alias' => $comment->article->alias]) }}">&#187;</a>
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endif