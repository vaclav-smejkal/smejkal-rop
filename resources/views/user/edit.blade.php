@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <section id="edit">
        <div class="container">
            <h1 class="title">Editování uživatele {{ $user->name }}</h1>
            <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-floating">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Název produktu"
                        value="{{ $user->name }}">
                    <label for=" name">Jméno</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label for="image" class="form-label">Profilový obrázek</label>
                <input class="form-control" type="file" id="image" name="image">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button type="submit" class="btn btn-primary mt-3">Editovat</button>
            </form>
        </div>
    </section>
@endsection
