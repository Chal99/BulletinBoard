<?php

namespace App\Contracts\Services\API;

use App\Models\User;

interface UserAPIServiceInterface
{
    /**
     * Get User List
     * @return array userList
     */
    public function getUserList();
}
