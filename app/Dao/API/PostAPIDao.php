<?php

namespace App\Dao\API;

use App\Contracts\Dao\API\PostAPIDaoInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostAPIDao implements PostAPIDaoInterface
{
    /**
     * Get Post List
     * @return array postList
     */
    public function getPostList()
    {
        return Post::with('user')->get();
    }
}