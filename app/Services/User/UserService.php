<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;
use App\Models\User;

class UserService implements UserServiceInterface
{
    private $userDao;

    /**
     * Class Constructor
     * @param OperatorUserDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }
    /**
     * Get User List
     * @return array $userList
     */
    public function getUserList()
    {
        return $this->userDao->getUserList();
    }
    /**
     * Store User
     * @param Illuminate\Http\Request $request
     * @return array userList
     */
    public function storeUser($request)
    {
        return $this->userDao->storeUser($request);
    }
    /**
     * Update User
     * @param Illuminate\Http\Request $request
     * @param App\Model\User $user
     * @return array userList
     */
    public function updateUser($request, User $user)
    {
        return $this->userDao->updateUser($request, $user);
    }
}
