@extends('layouts.app')

@section('title', 'Zapomenuté heslo')

@section('content')
    <section id="login">
        <div class="container">
            <form class="m-auto py-4 w-75 forgot-form" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-floating">
                    <input class="form-control" id="email" name="email" placeholder="E-mail">
                    <label for="floatingInput">E-mail</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Poslat email</button>
                </div>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
            </form>
        </div>
    </section>
@endsection
