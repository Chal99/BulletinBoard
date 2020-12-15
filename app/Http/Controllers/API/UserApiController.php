<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Contracts\Services\API\UserAPIServiceInterface;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Facade\FlareClient\Time\Time;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    private $userInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserAPIServiceInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(),'password'=> auth()->user()->password, 'accessToken' => $accessToken]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->userInterface->getUserList();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->userInterface->storeUser($request);
    }

    /**
     * Store Image for Confirm
     * @param Illuminate\Http\Request $request
     * @return array userList
     */
    public function changePassword(Request $request,User $user)
    {
        $request->validate([
            'currentpassword'=>['required',function($attribute,$value,$fail) use($user){
                if(!Hash::check($value,$user->password)){
                    return $fail(__('Password is not incorrect'));
                }
            }],
            'newpassword'=>'required|min:6',
            'confirmpassword'=>'required_with:newpassword|same:newpassword'
        ]);
        $user->password=Hash::make($request->newpassword);
        $user->update();
        return response()->json($request);
        
    }

    /**
     * Store Image for Confirm
     * @param Illuminate\Http\Request $request
     * @return array userList
     */
    public function storeImage(Request $request)
    {
        $upload_path = public_path('/storage/upload');
        $file_name = $request->profile->getClientOriginalName();
        $generated_new_name = Time() . '-' . $file_name;
        $request->profile->move($upload_path, $generated_new_name);

        $save = new Photo;
        $save->name = $file_name;
        $save->path = '/storage/upload/' . $generated_new_name;
        $save->save();
        return response()->json(['success' => 'You have successfully uploaded "' . $file_name . '"']);
    }

    /**
     * Image for Vue User Confirm
     * 
     * @return array userList
     */
    public function ImageConfirm()
    {
        return Photo::latest()->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $upload_path = public_path('/storage/upload');
        $file_name = $request->profile->getClientOriginalName();
        $generated_new_name = Time() . '-' . $file_name;
        $request->profile->move($upload_path, $generated_new_name);

        $user->profile = '/storage/upload/' . $generated_new_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->update();
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return $this->userInterface->deleteUser($user);
    }
}
