@extends('layouts.app')

@section('title', 'Zapomenuté heslo')

@section('content')
    <form class="m-auto py-4 w-75 forgot-form" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="my-4">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        @error('email')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="form-footer">
            <button type="submit">Poslat email</button>
        </div>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
    </form>
@endsection
