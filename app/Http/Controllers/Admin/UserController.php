<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()
            ->withCount('posts')
            ->withCount('comments')
            ->paginate();
        return view('admin.users.index', compact('users'))
            ->with('message', 'user has been delete....');
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $posts = $user->posts()->withCount('comments')->simplePaginate();
        return view('admin.users.show', compact('user', 'posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $message = 'User has been deleted!';
        DB::transaction(function() use($user, &$message){
            try {
                $user->delete();
            }catch (\Exception $exception){
                $message = $exception->getMessage();
            }
        });

        return redirect()->route('admin.users.index')->with('message', $message);
    }
}
