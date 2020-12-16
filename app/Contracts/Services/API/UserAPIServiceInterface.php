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
  /**
   * Store User
   * @return array userList
   */
  public function storeUser($request);
  /**
   * Update User
   * @return array userList
   */
  public function updateUser($request, $user);
  /**
   * Delete User
   * @return array userList
   */
  public function deleteUser($user);
}
