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
    
}
