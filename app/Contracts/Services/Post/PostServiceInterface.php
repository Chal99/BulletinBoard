<?php

namespace App\Contracts\Services\Post;

use App\Models\Post;

interface PostServiceInterface
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
