<?php

namespace App\Contracts\Dao\API;

use App\Models\User;

interface UserAPIDaoInterface
{
    /**
     * Get User List
     * @return array userList
     */
    public function getUserList();
}
