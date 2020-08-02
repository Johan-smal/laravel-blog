<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'slow']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::with('user')->get();
        return view()->make('post.index')
            ->with(compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view()->make('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $user = Auth::user();

        $post = new Post($validatedData);

        $post->user()->associate($user);
        
        $post->save();

        return redirect(route('posts.edit', $post->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Post $post)
    {
        $user = Auth::user();
        return view()->make('post.show')
            ->with(compact('post', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Post $post)
    {
        $user = Auth::user();
        if ($post->user->id != $user->id)
            abort(404);

        return view()->make('post.edit')
            ->with(compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Post $post)
    {
        $user = Auth::user();
        if ($post->user->id != $user->id)
            abort(404);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update($validatedData);

        return redirect(route('posts.edit', $post->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Post $post)
    {
        $user = Auth::user();
        if ($post->user->id != $user->id)
            abort(404);

        $post->delete();
        return redirect(route('posts.index'));
    }
}
