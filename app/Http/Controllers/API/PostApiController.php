<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Contracts\Services\API\PostAPIServiceInterface;

class PostApiController extends Controller
{
    private $postInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostAPIServiceInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }
    /**
     * Post list for API vue.
     *
     * @return array
     */
    public function index(){
        return $this->postInterface->getPostList();
    }
}