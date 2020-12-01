<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Symfony\Component\Console\Input\Input;
use App\Http\Requests\UserConfirmationRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserUpdatePasswordRequest;

class UserController extends Controller
{
    private $userInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServiceInterface $userInterface)
    {
        $this->middleware('IsAdmin')->except(['create','confirmation','store']);
        $this->userInterface = $userInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userInterface->getUserList();
        return view('users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('users.create',["name"=>'',"email"=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel($name,$email)
    {
        return view('users.create',["name"=>$name,"email"=>$email]);
    }


    /**
     * Get data for confirmation page 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmation(UserConfirmationRequest $request)
    {
        if ($request->profile) {
            $file_name = $request->get('name') . '-' . $request->file('profile')->getClientOriginalName();
            $file_path = $request->file('profile')->storeAs('uploads', $file_name, 'public');
            return view(
                'users.confirm-user',
                [
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => $request->password,
                    "confirmpassword" => $request->confirmpassword,
                    "type" => $request->type,
                    "phone" => $request->phone,
                    "dob" => $request->dob,
                    "address" => $request->address,
                    "image" => '/storage/' . $file_path
                ]
            );
        }
        if($request->profile_new){
            return view(
                'users.confirm-user',
                [
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => $request->password,
                    "confirmpassword" => $request->confirmpassword,
                    "type" => $request->type,
                    "phone" => $request->phone,
                    "dob" => $request->dob,
                    "address" => $request->address,
                    "image" => $request->profile_new
                ]
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserConfirmationRequest $request)
    {
        switch ($request->input('action')) {
            case 'save':
                $this->userInterface->storeUser($request);
                return redirect()->route('user.index')->with('success', 'User Created Successfully.');
                break;

            case 'cancel':
                return redirect()->route('user.create')->withInput($request->all());
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $this->userInterface->updateUser($request, $user);
        return redirect()->route('user.index')->with('success', 'User Updated Successfully.');
    }

    /**
     * Show the form for change password the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_password()
    {
        return view('profile.change-password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update_password(UserUpdatePasswordRequest $request, User $user)
    {
        $this->userInterface->updatePassword($request);
        return redirect()->route('user.index')->with('success', 'User Password Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param   \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $this->userInterface->destroyUser($request);
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
