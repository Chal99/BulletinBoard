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
    /**
   * Store User
   * @return array $userList
   */
  public function storeUser($request)
  {
    return $this->userDao->storeUser($request);
  }
  /**
   * Update User
   * @return array $userList
   */
  public function updateUser($request, $user)
  {
    return $this->userDao->updateUser($request, $user);
  }
  /**
   * Delete User
   * @return array $userList
   */
  public function deleteUser($user)
  {
    return $this->userDao->deleteUser($user);
  }
    
}
