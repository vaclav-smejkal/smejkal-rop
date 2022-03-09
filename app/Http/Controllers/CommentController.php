<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            $rules = [
                'comment_body' => [
                    'required',
                    'string',
                ],
            ],
            $messages = [],
        )->validate();
        //dd($request->comment_body);
        $comment = new Comment;
        $comment->body = $request->get('comment_body');     //body
        $comment->user()->associate($request->user());      //vytvari to vztah User a Comment a dosazuje user_id
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        return back()->with('message', 'Komentář byl přidán');
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back()->with('message', 'Komentář byl přidán');
    }
}
