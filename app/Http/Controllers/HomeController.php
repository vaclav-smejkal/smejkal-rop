<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $posts = Post::join('users', 'posts.user_id', "=", 'users.id')->select('posts.*', 'users.role_id', 'users.name')->where([['role_id', 1], ['title', 'regexp', $request->search]])->limit(15)->get();
        } else {
            $posts = Post::join('users', 'posts.user_id', "=", 'users.id')->select('posts.*', 'users.role_id', 'users.name')->where('role_id', 1)->limit(15)->get();
        }
        return view('dashboard', ['posts' => $posts]);
    }
}
