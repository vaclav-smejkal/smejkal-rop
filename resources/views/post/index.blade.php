@extends('layouts.app')
@section('title', 'Diskuzní fórum')

@section('content')
    <section id="posts">
        <div class="container">
            <h1 class="main-title">Diskuzní fórum</h1>
            <p class="desc">
                Lorem ipsum dolor sit amet, consectetuer quia adipiscing elit. Neque quia porro quisquam est, qui
                dolorem ipsum quia dolor sit amet, consectetur, adipiscing adipisci velit.
            </p>
            <form action="/posts" method="GET" class="form">
                <input type="text" name="search">
                <button type="submit" class="btn btn-primary">Vyhledat</button>
            </form>
            @isset($search)
                <p class="search">Výsledky hledání pro výraz {{ $search }}.</p>
            @endisset
            <div class="posts-grid">
                @foreach ($posts as $key => $post)
                    <div class="post">
                        <div class="post-header">
                            <div class="subtitle">{{ $post->title }}</div>
                            <div class="date">{{ date_format($post->created_at, 'H:i | d.m.Y') }}</div>
                        </div>
                        <div class="body">{{ mb_strimwidth($post->body, 0, 350, '...') }}</div>
                        <div class="btn-group">
                            <a href="{{ url('posts/' . $post->id) }}" class="btn btn-primary">
                                Číst více
                            </a>
                            @auth
                                @if (Auth::id() == $post->user_id)
                                    <a href="" class="btn btn-success"> <i class="fa fa-pencil"></i></a>

                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
