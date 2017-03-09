<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Comment;
use App\Article;

class CommentController extends SiteController
{
    //

    public function store(Request $request)
    {
        $data = $request->except('_token', 'comment_parent', 'comment_post_ID');

        $data['article_id'] = $request->input('comment_post_ID');
        $data['parent_id'] = $request->input('comment_parent');

        $validator = Validator::make($data, [

            'article_id' => 'integer|required',
            'parent_id' => 'integer|required',
            'text' => 'required',

        ]);

        $validator->sometimes('name', 'required', function() {
            return !Auth::check();
        });
        $validator->sometimes('email', 'email|required', function() {
            return !Auth::check();
        });

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $user = Auth::user();

        $comment = new Comment($data);

        if ($user) {
            $comment->user_id = $user->id;
            $comment->name = $user->name;
            $comment->email = $user->email;
        }

        $post = Article::find($data['article_id']);
        $post->comments()->save($comment);

        $comment->load('user');

        $data['id'] = $comment->id;
        $data['created_at'] = $comment->created_at;

        $data['email'] = (!empty($data['email'])) ? $data['email'] : $comment->user->email;
        $data['name'] = (!empty($data['name'])) ? $data['name'] : $comment->user->name;


        $comment = view('pink.one_comment')->with('data', $data)->render();

        return response()->json(['success' => TRUE, 'comment' => $comment, 'data' => $data]);




    }

}
