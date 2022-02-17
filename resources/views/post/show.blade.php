@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    {{ $post->id }}
    {{ $post->title }}
    {{ $post->body }}
    <p>jmeno uzivatele: {{ $user->name }}</p>

    <p>kategorie: {{ $category->name }} </p>

@endsection
