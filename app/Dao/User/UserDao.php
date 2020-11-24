<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     * Store User
     * @param Illuminate\Http\Request $request
     * @return array userList
     */
    public function storeUser($request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
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
     * Update User
     * @param Illuminate\Http\Request $request
     * @param App\Model\User $user
     * @return array userList
     */
    public function updateUser($request, User $user)
    {
        if ($request->profile) {
            $path = public_path();
            //code for remove old file
            $file_old = $path . $user->profile;
            unlink($file_old);
            $file_name = $request->get('name') . '-' . $request->file('profile')->getClientOriginalName();
            $file_path = $request->file('profile')->storeAs('uploads', $file_name, 'public');
            $user->profile = '/storage/' . $file_path;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->type = $request->type;
            $user->phone = $request->phone;
            $user->dob = $request->dob;
            $user->address = $request->address;
            return $user->update();
        }
        return $user->update($request->all());
    }
    /**
     * Update User Password
     * @param Illuminate\Http\Request $request
     */
    public function updatePassword($request)
    {
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_psw)]);
    }
    /**
     * Delete User
     * @param Illuminate\Http\Request $request
     */
    public function destroyUser($request)
    {
        User::find($request->user_id)->delete();
    }
}
