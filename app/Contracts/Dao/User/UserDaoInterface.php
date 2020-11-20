<?php

namespace App\Contracts\Dao\User;

use App\Models\User;

interface UserDaoInterface
{
    /**
     * Get User List
     * @return array userList
     */
    public function getUserList();
    /**
     * Store User
     * @param Illuminate\Http\Request $request
     * @return array userList
     */
    public function storeUser($request);
    /**
     * Update User
     * @param Illuminate\Http\Request $request
     *  @param App\Models\User $user
     * @return array userList
     */
    public function updateUser($request, User $user);
}
