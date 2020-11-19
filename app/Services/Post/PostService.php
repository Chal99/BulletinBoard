<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Models\Post;

class PostService implements PostServiceInterface
{
  private $postDao;

  /**
   * Class Constructor
   * @param OperatorPostDaoInterface
   * @return
   */
  public function __construct(PostDaoInterface $postDao)
  {
    $this->postDao = $postDao;
  }
  /**
   * Get post List
   * @return array $postList
   */
  public function getPostList()
  {
    return $this->postDao->getPostList();
  }
  /**
   * Store Post
   * @param Illuminate\Http\Request $request
   * @return array postList
   */
  public function storePost($request)
  {
    return $this->postDao->storePost($request);
  }
  /**
   * Update Post
   * @param Illuminate\Http\Request $request
   * @param App\Model\Post $post
   * @return array postList
   */
  public function updatePost($request, Post $post)
  {
    return $this->postDao->updatePost($request, $post);
  }
}
