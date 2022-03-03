@extends('layouts.app')
@section('title', 'Přihlášení')

@section('content')
    <section id="login">
        <h1 class="title">Registrace</h1>
        <div class="container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        value="{{ old('name') }}" placeholder="name">
                    <label for="name">Jméno</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                        value="{{ old('email') }}" placeholder="E-mail">
                    <label for="email">E-mail</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        id="password" placeholder="Heslo">
                    <label for="password">Heslo</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="password-confirm" name="password_confirmation" placeholder="Heslo">
                    <label for="password-confirm">Heslo znovu</label>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">
                        Registrovat
                    </button>
                    <div class="links">
                        <a href="{{ url('login') }}">Už máte účet?</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
