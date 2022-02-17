@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <form action="/posts" method="GET">

        <input type="text" name="search">
        <button type="submit">vyhledat</button>
    </form>
    <table>
        @foreach ($posts as $key => $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->slug }}</td>

                <td>{{ $post->created_at }}</td>
                <td>
                    <!-- Button trigger modal -->="
                    <!--route('admin.post.show', $post->id) -->

                    <a href="{{ url('posts/' . $post->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
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
                </td>
            </tr>
        @endforeach
    </table>
@endsection
