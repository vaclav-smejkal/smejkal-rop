<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function index(Request $request)
    {
        if ($request->search) {
            $posts = Post::join('users', 'posts.user_id', "=", 'users.id')
                ->select('posts.*', 'users.role_id', 'users.name')
                ->where([['role_id', null], ['title', 'regexp', $request->search]])
                ->limit(15)->get();
        } else {
            $posts = Post::join('users', 'posts.user_id', "=", 'users.id')
                ->select('posts.*', 'users.role_id', 'users.name')
                ->where('role_id', null)
                ->limit(15)->get();
        }
        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {

        return view('post.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            $rules = [
                'title' => [
                    'required',
                    'string',
                    'max:100',
                ],
                'body' => [
                    'required',
                ],
            ],
            $messages = []
        )->validate();

        $post = Post::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'user_id' => Auth::id(),
        ]);
        return redirect('/post/create')->with('message', 'Příspěvek byl přidán');
    }

    public function show($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        $user = User::where('id', $post->user_id)->first();

        if (!$post) {
            abort(404);
        }

        return view('post.show', [
            'post' => $post, 'user' => $user,
        ]);
    }
    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
        if (Auth::id() == $post->user_id) {
            $post->delete();
            return redirect('/');
        }
    }
    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);

        if (Auth::id() == $post->user_id) {
            return view('post.edit', ["post" => $post, "categories" => $categories]);
        } else {
        }
    }
    public function update(Request $request, Post $post)
    {
        Validator::make(
            $request->all(),
            $rules = [
                'title' => [
                    'required',
                    'string',
                    'max:100',
                ],
                'body' => [
                    'required',
                ],

            ],
            $messages = []
        )->validate();

        $post->title = $request->title;
        $post->body = $request->body;


        $post->save();

        return redirect('/');
    }
}
