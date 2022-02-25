@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <section id="post">
        <div class="container">
            <div class="title">
                {{ $post->title }}
            </div>
            <div class="author">Autor: {{ $user->name }}</div>
            <p class="body">
                {{ $post->body }}
            </p>
        </div>
    </section>
@endsection
