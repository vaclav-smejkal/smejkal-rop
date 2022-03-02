@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <section id="posts">
        <div class="container">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf

                <h1 class="main-title">Vytváření článku</h1>
                <p class="desc">
                    Zde můžeš vytvořit vlastní článek.
                </p>
                <div class="form-floating mb-1">
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
                    <input type="text" class="form-control" name="body" id="body" placeholder="Tělo příspěvku"
                        value="{{ old('body') }}">
                    <label for="name">Obsah příspěvku</label>
                    @error('title')
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
                <button type="submit" class="btn btn-primary mt-2">Přidat</button>
            </form>
        </div>
    </section>
@endsection
