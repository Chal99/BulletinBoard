<?php

namespace App\Contracts\Dao\Post;

use App\Models\Post;

interface PostDaoInterface
{
    /**
     * Get Post List
     * @return array postList
     */
    public function getPostList();
    /**
     * Store Post
     * @param Illuminate\Http\Request $request
     * @return array postList
     */
    public function storePost($request);
    /**
     * Update Post
     * @param Illuminate\Http\Request $request
     *  @param App\Models\Post $post
     * @return array postList
     */
    public function updatePost($request, Post $post);
    /**
     * Delete Post
     * @param Illuminate\Http\Request $request
     * @return array postList
     */
    public function destroyPost($request);
}
