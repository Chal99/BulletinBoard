<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
    /**
     * Get Post List
     * @return array postList
     */
    public function getPostList();
}
