<?php

namespace App\Http\Controllers;

use App\Post;

use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post) {

        // Long winded form
        // Comment::create([

        //     'body' => request('body'),

        //     'post_id' => $post->id

        // ]);

        // add a comment to a post
        $this->validate(request(), ['body' => 'required|min:2']);

        $post->addComment(request('body'));

        return back();

    }
}
