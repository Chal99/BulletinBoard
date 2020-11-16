<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;

class UserDao implements UserDaoInterface
{
    /**
     * Get User List
     * @return array userList
     */
    public function getUserList()
    {
        return User::get();
    }
}
