<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * Index page with only the posts you created
     *
     * @return Application|Factory|View
     */
    public function myIndex(): View|Factory|Application
    {
        $id = auth()->user()->id;
        $posts = Post::where('user_id', $id)->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request)
    {
        Post::create($this->validatedPost($request));

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post): View|Factory|Application
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {
        $post->update($this->validatedPost($request));

        return redirect(route('posts.show', $post));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Post $post): Redirector|RedirectResponse|Application
    {
        $this->authorize('update', $post);

        $post->delete();

        return redirect(route('posts.index'));
    }

    /**
     * Validates the given input
     *
     * @param Request $request
     * @return array
     */
    protected function validatedPost(Request $request): array
    {
        return request()->validate([
            'title' => ['required'],
            'excerpt' => ['required'],
            'body' => ['required'],
            'user_id' => ['required']
        ]);
    }
}
