<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
    /**
     * Get User List
     * @return array userList
     */
    public function getUserList();
}
