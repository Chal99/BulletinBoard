<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;

class UserDao implements UserDaoInterface
{
    /**
     * Get User List
     * @param Object
     * @return $userList
     */
    public function getUserList()
    {
        return User::get();
    }
}
