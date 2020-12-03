<?php

namespace App\Contracts\Services\API;

use App\Models\Post;

interface PostAPIServiceInterface
{
  /**
   * Get Post List
   * @return array postList
   */
  public function getPostList();
  
}
