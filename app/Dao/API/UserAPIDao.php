<?php

namespace App\Dao\API;

use App\Contracts\Dao\API\UserAPIDaoInterface;
use App\Models\User;

class UserAPIDao implements UserAPIDaoInterface
{
    /**
     * Get User List
     * @return array userList
     */
    public function getUserList()
    {
        return User::with('user')->get();
    }
    
}
