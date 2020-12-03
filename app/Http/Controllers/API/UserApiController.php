<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Contracts\Services\API\UserAPIServiceInterface;

class UserApiController extends Controller
{
    private $userInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserAPIServiceInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }
    /**
     * Post list for API vue.
     *
     * @return array
     */
    public function index(){
        return $this->userInterface->getUserList();
    }
}
