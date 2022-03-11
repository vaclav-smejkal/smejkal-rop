@foreach ($comments as $comment)
    <div class="comment @if ($comment->parent_id != null) parent @endif">
        <div class="comment-border">
            <div class="avatar-align">
                <a class="avatar" href="/user/{{ $comment->user->id }}">
                    <div class="img">
                        <img src="{{ $comment->user->image }}" alt="{{ $comment->user->name }}">
                    </div>
                    <div class="name">{{ $comment->user->name }}</div>
                </a>
                &nbsp;{{ date_format($comment->created_at, '| d.m.Y') }}
            </div>
            <p class="comment-body">{{ $comment->body }}</p>
            @auth
                <a class="reply-btn" href="#">
                    Odpovědět
                </a>
                <form method="post" action="{{ route('reply.add') }}" id="comment-form" class="hide">
                    @csrf
                    <div class="input">
                        <input type="text" name="comment_body" placeholder="Napište komentář..." class="form-control" />
                    </div>
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                    @error('comment_body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Přidat</button>
                    </div>
                </form>
            @endauth
        </div>
        @include('comment_replies', [
            'comments' => $comment->replies,
        ])
    </div>
@endforeach
