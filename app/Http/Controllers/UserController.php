<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show($user_id, Request $request)
    {
        $user = User::where('id', $user_id)->first();

        //$posts = Post::where('user_id', $user_id)->get();

        if ($request->search) {
            $posts = Post::where([['user_id', $user_id], ['title', 'regexp', $request->search]])
                ->limit(15)->get();
        } else {
            $posts = Post::where('user_id', $user_id)->limit(15)->get();
        }
        return view('user.show', [
            'user' => $user, 'posts' => $posts
        ]);
    }
}
