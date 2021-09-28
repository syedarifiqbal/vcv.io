<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::query()
            ->with('owner:id,name')
            ->withCount('comments')
            ->paginate();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $comments = $post->comments()->simplePaginate(2);
        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $message = 'Post has been deleted!';
        DB::transaction(function () use ($post, &$message) {
            try {
                $post->delete();
            } catch (\Exception $exception) {
                $message = $exception->getMessage();
            }
        });

        return redirect()->back()->with('message', $message);
    }
}
