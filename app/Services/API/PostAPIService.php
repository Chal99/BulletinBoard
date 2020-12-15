<?php

namespace App\Services\API;

use App\Contracts\Dao\API\PostAPIDaoInterface;
use App\Contracts\Services\API\PostAPIServiceInterface;
use App\Models\Post;

class PostAPIService implements PostAPIServiceInterface
{
  private $postDao;

  /**
   * Class Constructor
   * @param OperatorPostDaoInterface
   * @return
   */
  public function __construct(PostAPIDaoInterface $postDao)
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
   * @return array $postList
   */
  public function storePost($request)
  {
    return $this->postDao->storePost($request);
  }
  /**
   * Update Post
   * @return array $postList
   */
  public function updatePost($request, $post)
  {
    return $this->postDao->updatePost($request, $post);
  }
  /**
   * Delete Post
   * @return array $postList
   */
  public function deletePost($post)
  {
    return $this->postDao->deletePost($post);
  }
}
