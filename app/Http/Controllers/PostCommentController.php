<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Post $post, Request $request, Comment $comment)
    {
        $request->validate(['body' => 'required'], ['body.required' => 'The Comment field is required.']);
        $comment->fill($request->only($comment->getFillable()));
        $comment->owner()->associate(auth()->user());
        $post->comments()->save($comment);

        return redirect()->back()->with('message', 'Comment has been saved!');
    }
}
