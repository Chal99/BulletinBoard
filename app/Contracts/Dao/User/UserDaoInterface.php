<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
    /**
     * Get User List
     * @return array userList
     */
    public function getUserList();
}
