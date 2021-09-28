<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostCommentController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post, Comment  $comment)
    {
        $message = 'Post has been deleted!';
        DB::transaction(function () use ($comment, &$message) {
            try {
                $comment->delete();
            } catch (\Exception $exception) {
                $message = $exception->getMessage();
            }
        });

        return redirect()->back()->with('message', $message);
    }
}
