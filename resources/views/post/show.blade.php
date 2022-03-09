@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <section id="post">
        <div class="container">
            <div class="title">
                {{ $post->title }}
            </div>
            Autor:<a href="/user/{{ $user->id }}"> {{ $user->name }}</a>
            <p class="body">
                {{ $post->body }}
            </p>
            <h1 class="mt-2">Přidat komentář</h1>

            @auth
                <div class="mt-1">
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-floating">
                            <div class="form-group">
                                <input type="text" name="comment_body" id="comment_body" class="form-control" />
                                @error('comment_body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                <input type="hidden" name="user_id" value="{{ $user->id }}" />
                            </div>
                            <div class="mt-2"></div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary mt-1" value="Přidat komentář" />
                            </div>

                        </div>
                    </form>
                </div>

            @endauth
            <h1 class="mt-2">Komentáře</h1>

            @include('comment_replies', [
                'comments' => $post->comments,
                'post_id' => $post->id,
            ])
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif


        </div>
    </section>
@endsection
