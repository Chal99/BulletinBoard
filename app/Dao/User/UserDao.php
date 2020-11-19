<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    /**
     * Store Post
     * @param Illuminate\Http\Request $request
     * @return array postList
     */
    public function storeUser($request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->profile = $request->profile;
        $user->create_user_id = '1';
        $user->updated_user_id = '1';
        return $user->save();
    }
    /**
     * Update Post
     * @param Illuminate\Http\Request $request
     * @param App\Model\Post $post
     * @return array postList
     */
    public function updateUser($request, User $user)
    {
        if ($request->profile) {
            $path = public_path();
            //code for remove old file
            $file_old = $path . $user->profile;
            unlink($file_old);
            $fileName = $request->get('name') . '-' . $request->file('profile')->getClientOriginalName();
            $filePath = $request->file('profile')->storeAs('uploads', $fileName, 'public');
            $user->profile = '/storage/' . $filePath;
            $user->update();
        }
        $user->update();
    }
}
