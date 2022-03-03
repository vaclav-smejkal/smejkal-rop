@extends('layouts.app')
@section('title', 'Editace příspěvku')

@section('content')
    <section id="edit">
        <div class="container">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="form-floating">
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
                    <textarea type="text" class="form-control" name="body" id="body" placeholder="Tělo příspěvku"
                        style="height: 200px">{{ old('body') }}</textarea>
                    <label for="name">Obsah příspěvku</label>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <select class="form-select" name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Přidat</button>
            </form>
        </div>
    </section>
@endsection
