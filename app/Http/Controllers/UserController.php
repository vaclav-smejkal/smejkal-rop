<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Cloudinary;

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

    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);

        if (Auth::id() == $user->id) {
            return view('user.edit', ["user" => $user]);
        }
    }
    public function update(Request $request, User $user)
    {
        Validator::make(
            $request->all(),
            $rules = [
                'name' => [
                    'required',
                    'string',
                    'max:100',
                ],
            ],
            $messages = []
        )->validate();


        if ($request->hasFile('image')) {
            $newImageName = time() . '.' . $request->image->extension();

            $uploadedFileUrl = Cloudinary::upload($request->image->getRealPath())->getSecurePath();
            $user->image = $uploadedFileUrl;
        }

        $user->name = $request->name;


        $user->save();

        return redirect('/');
    }
}
