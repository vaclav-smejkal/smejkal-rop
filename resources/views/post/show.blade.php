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
        </div>
    </section>
@endsection
