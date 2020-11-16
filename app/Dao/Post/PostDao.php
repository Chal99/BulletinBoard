<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;

class PostDao implements PostDaoInterface
{
    /**
     * Get Operator List
     * @param Object
     * @return $operatorList
     */

    public function getPostList()
    {
        return Post::get();
    }
}
