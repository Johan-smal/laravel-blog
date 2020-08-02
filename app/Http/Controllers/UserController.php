<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the post by user.
     *
     * @return Response
     */
    public function posts(User $user)
    {
        $posts = $user->posts()->get();

        return view()->make('post.index')
            ->with(compact('posts'));
    } 
}
