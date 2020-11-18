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
   * store Post List
   */
  public function storePost($request);

  /**
   * update Post List
   */
  public function updatePost($request, Post $post);
}
