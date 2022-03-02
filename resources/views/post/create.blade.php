@extends('layouts.app')
@section('title', 'Editace příspěvku')

@section('content')
<<<<<<< HEAD
    <section id="posts">
        <div class="container">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf

                <h1 class="main-title">Vytváření článku</h1>
                <p class="desc">
                    Zde můžeš vytvořit vlastní článek.
                </p>
                <div class="form-floating mb-1">
=======
    <section id="edit">
        <div class="container">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="form-floating">
>>>>>>> de2ab1bcfc2ff6c9ee1e0b6e3e51bc92a96fa46d
                    <input type="text" class="form-control" name="title" id="title" placeholder="Název příspěvku"
                        value="{{ old('title') }}">
                    <label for="name">Titulek příspěvku</label>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating">
<<<<<<< HEAD
                    <input type="text" class="form-control" name="body" id="body" placeholder="Tělo příspěvku"
                        value="{{ old('body') }}">
                    <label for="name">Obsah příspěvku</label>
                    @error('title')
=======
                    <textarea type="text" class="form-control" name="body" id="body" placeholder="Tělo příspěvku"
                        style="height: 200px">{{ old('body') }}</textarea>
                    <label for="name">Obsah příspěvku</label>
                    @error('body')
>>>>>>> de2ab1bcfc2ff6c9ee1e0b6e3e51bc92a96fa46d
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
<<<<<<< HEAD

=======
                <select class="form-select" name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
>>>>>>> de2ab1bcfc2ff6c9ee1e0b6e3e51bc92a96fa46d
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
<<<<<<< HEAD
                <button type="submit" class="btn btn-primary mt-2">Přidat</button>
=======
                <button type="submit" class="btn btn-primary">Přidat</button>
>>>>>>> de2ab1bcfc2ff6c9ee1e0b6e3e51bc92a96fa46d
            </form>
        </div>
    </section>
@endsection
