<?php

namespace App\Services\API;

use App\Contracts\Dao\API\UserAPIDaoInterface;
use App\Contracts\Services\API\UserAPIServiceInterface;
use App\Models\User;

class UserAPIService implements UserAPIServiceInterface
{
    private $userDao;

    /**
     * Class Constructor
     * @param OperatorUserDaoInterface
     * @return
     */
    public function __construct(UserAPIDaoInterface $userDao)
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
    
}
