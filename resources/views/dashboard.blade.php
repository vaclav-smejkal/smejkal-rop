@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

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
                <a href="" class="btn btn-success"> <i class="fa fa-pencil"></i></a>

                <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#deleteModal-{{ $post->id }}">
                    <i class="fa fa-trash-o"></i>
                </button>
            </td>
        </tr>
    @endforeach

@endsection
