@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <section id="edit">
        <div class="container">
            <h1 class="title">Editování příspěvku {{ $post->title }}
            </h1>
            <form action="{{ route('post.update', $post) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-floating">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Název příspěvku"
                        value="{{ $post->title }}">
                    <label for="name">Titulek příspěvku</label>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating">
                    <textarea type="text" class="form-control" name="body" id="body" placeholder="Tělo příspěvku"
                        style="height: 200px">{{ $post->body }}</textarea>
                    <label for="name">Obsah příspěvku</label>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="form-floating">
                    <button type="submit" class="btn btn-primary">Editovat</button>
                </div>
            </form>
        </div>
    </section>
@endsection
