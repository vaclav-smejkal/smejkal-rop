@foreach ($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        @auth
            <form method="post" action="{{ route('reply.add') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="comment_body" class="form-control" />
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary mt-1" value="Přidat komentář" />
                </div>
            </form>
        @endauth

        @include('comment_replies', [
            'comments' => $comment->replies,
        ])
    </div>
@endforeach
