<?php

namespace App\Contracts\Dao\API;

use App\Models\Post;

interface PostAPIDaoInterface
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
    public function updatePost($request,$post);
    /**
     * Delete Post
     * @return array postList
     */
    public function deletePost($post);
}
