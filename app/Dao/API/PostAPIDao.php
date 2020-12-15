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
        // use global require so there's no parameter Request to inject
        if(request('search')){
            return Post::where('title','like','%' . request('search') . '%')
            ->orderBy('id','desc')->get();
        }
        else{
            return Post::with('user')->orderBy('id','desc')->get();
        }
    }
    /**
     * Store Post
     * @return array postList
     */
    public function storePost($request)
    {
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'create_user_id' => 1,
            'updated_user_id' => 1
        ]);
        return $post;
    }
    /**
     * Update Post
     * @return array postList
     */
    public function updatePost($request,$post)
    {
        $post->update($request->only('title','description','status'));
        return $post;
    }
    /**
     * Delete Post
     * @return array postList
     */
    public function deletePost($post)
    {
        $post->delete();        
        return $post;
    }
}