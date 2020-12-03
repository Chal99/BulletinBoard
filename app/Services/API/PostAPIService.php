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
  
}
