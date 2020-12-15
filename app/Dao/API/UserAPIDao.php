<?php

namespace App\Dao\API;

use App\Contracts\Dao\API\UserAPIDaoInterface;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Support\Facades\Hash;

class UserAPIDao implements UserAPIDaoInterface
{
    /**
     * Get User List
     * @return array userList
     */
    public function getUserList()
    {
        // use global require so there's no parameter Request to inject
        if(request('search')){
            return User::where('name','like','%' . request('search') . '%')
            ->orderBy('id','desc')->get();
        }
        else{
            return User::with('user')->orderBy('id','desc')->get();
        }

        //OR with one query for short
        // return User::when(request('search'),function($query){
        //     $query->where('name','like','%' . request('search') . '%');
        // })->with('user')->orderBy('id','desc')->get();
        
    }
    /**
     * Store User
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
        $user->save();

        $accessToken=$user->createToken('authToken')->accessToken;

        return response(['user'=>$user,'accessToken'=>$accessToken]);
    }

    /**
     * Update User
     * @return array userList
     */
    public function updateUser($request,$user)
    {
            // $upload_path = public_path('/storage/upload');
            // $file_name = $request->file('profile')->getClientOriginalName();
            // $generated_new_name = Time().'-' . $file_name;
            // $request->profile->move($upload_path, $generated_new_name);
        
            // $user->profile = '/storage/upload/'.$generated_new_name;
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->type = $request->type;
            // $user->phone = $request->phone;
            // $user->dob = $request->dob;
            // $user->address = $request->address;
            return $user->update($request->all());
    }
    
    /**
     * Delete User
     * @return array userList
     */
    public function deleteUser($user)
    {
        
        $user->delete();        
        return $user;
    }
    
}
