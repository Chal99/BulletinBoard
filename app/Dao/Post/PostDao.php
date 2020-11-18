<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostDao implements PostDaoInterface
{
    /**
     * Get Post List
     * @return array postList
     */
    public function getPostList()
    {
        return Post::get();
    }
    /**
     * Store Post
     * @param Illuminate\Http\Request $request
     * @return array postList
     */
    public function storePost($request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->create_user_id = Auth::user()->id;
        $post->updated_user_id = Auth::user()->id;
        return $post->save();
    }
    /**
     * Update Post
     * @param Illuminate\Http\Request $request
     * @param App\Model\Post $post
     * @return array postList
     */
    public function updatePost($request, Post $post)
    {
        $post->update($request->all());
    }
}
