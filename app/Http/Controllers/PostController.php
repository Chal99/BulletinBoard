<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $postInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostServiceInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postInterface->getPostList();
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create',["title"=>'',"description"=>'']);
    }
    /**
     * Get data for confirmation page 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmation(Request $request)
    {
        //validate the form
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        return view('posts.confirm-post', ["title" => $request->title, "description" => $request->description]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        switch ($request->input('action')) {
            case 'save':
                $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                ]);

                $this->postInterface->storePost($request);
                return redirect()->route('post.index')
                    ->with('success', 'Product created successfully.');
                break;

            case 'cancel':
                return view('posts.create', [
                    "title" => $request->title,
                    "description" => $request->description,
                ]);
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        $this->postInterface->updatePost($request, $post);

        return redirect()->route('post.index')
            ->with('success', 'Post Confirm Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->userInterface->destroyUser($request);
        return redirect()->route('post.index')
            ->with('success', 'Post deleted successfully');
    }
}
