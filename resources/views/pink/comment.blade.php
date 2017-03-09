@foreach ($parent_comments as $comment)

<li id="li-comment-{{ $comment->id }}" class="comment {{ ($comment->user_id == $article->user_id) ? 'bypostauthor odd' : '' }}">
    <div id="comment-{{ $comment->id }}" class="comment-container">
        <div  class="comment-author vcard">
            <img alt="" src="{{ asset(env('THEME')) }}/images/avatar/unknow.png" class="avatar" height="75" width="75" />
            <cite class="fn">{{ $comment->user->name or $comment->name }}</cite>
        </div>
        <!-- .comment-author .vcard -->
        <div class="comment-meta commentmetadata">
            <div class="intro">
                <div class="commentDate">
                    <a >
                        {{ is_object($comment->created_at) ? $comment->created_at->format('F j, Y \a\t g:i a') : '' }} </a>
                </div>
                <div class="commentNumber">#&nbsp;</div>
            </div>
            <div class="comment-body">
                <p>{{ $comment->text }}</p>
            </div>
            <div class="reply group">
                <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-{{ $comment->id }}&quot;, &quot;{{ $comment->id }}&quot;, &quot;respond&quot;, &quot;{{ $comment->article_id }}&quot;)">{{ trans('site.reply') }}</a>
            </div>
            <!-- .reply -->
        </div>
        <!-- .comment-meta .commentmetadata -->
    </div>
    <!-- #comment-##  -->

@if (isset($article->comments->groupBy('parent_id')[$comment->id]))
    <ul class="children">
        @include('pink.comment', ['parent_comments' => $article->comments->groupBy('parent_id')[$comment->id]])
    </ul>
@endif
</li>


@endforeach