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
  public function storePost($request)
  {
    return $this->postDao->storePost($request);
  }
  public function updatePost($request,Post $post)
  {
    return $this->postDao->updatePost($request,$post);
  }

}
