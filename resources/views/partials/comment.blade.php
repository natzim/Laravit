<div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ route('users.show', $comment->user->name) }}">{{ $comment->user->name }}</a>
        <p>{!! Helper::markdownToHtml($comment->content) !!}</p>
    </div>
</div>
