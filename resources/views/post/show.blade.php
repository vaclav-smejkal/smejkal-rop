@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <section id="post">
        <div class="container">
            <div class="title">
                {{ $post->title }}
            </div>
            <p class="body">
                {{ $post->body }}
            </p>
            <div class="avatar-align mb-4">
                <a class="avatar" href="/user/{{ $user->id }}">
                    <div class="img">
                        <img src="{{ $user->image }}" alt="{{ $user->name }}">
                    </div>
                    <div class="name">{{ $user->name }}</div>
                </a>
            </div>
            <h2 class="subtitle">Komentáře</h2>
            @auth
                <p class="desc">
                    Přidat vlastní komentář
                </p>
                <form method="post" action="{{ route('comment.add') }}" id="comment-form">
                    @csrf
                    <div class="input">
                        <input type="text" name="comment_body" id="comment_body" class="form-control" />
                        @error('comment_body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    <input type="hidden" name="user_id" value="{{ $user->id }}" />
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Přidat</button>
                    </div>
                </form>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            @endauth
            @include('comment_replies', [
                'comments' => $post->comments,
                'post_id' => $post->id,
            ])
        </div>
    </section>
@endsection
