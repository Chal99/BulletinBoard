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
     * @return array postList
     */
    public function storePost($request);
    /**
     * Update Post
     * @return array postList
     */
    public function updatePost($request, Post $post);
}
