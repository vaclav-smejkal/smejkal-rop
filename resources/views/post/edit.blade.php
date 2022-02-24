@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <section id="posts">
        <div class="container">
            <h1 class="title">Editování příspěvku {{ $post->title }} <span><i class="fas fa-edit"></i></span>
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
                    <input type="text" class="form-control" name="body" id="body" placeholder="Tělo příspěvku"
                        value="{{ $post->body }}">
                    <label for="name">Obsah příspěvku</label>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <select name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($post->category_id == $category->id) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
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
