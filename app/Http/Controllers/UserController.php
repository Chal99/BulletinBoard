<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    public function create()
    {
        return view('users.create');
    }

    /**
     * Get data for confirmation page 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmation(Request $request)
    {
        //validate the form
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required_with:password|same:password',
            'type' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'profile' => 'required|size:20000'
        ]);
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //validate the form
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required_with:password|same:password',
            'type' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
        ]);
        $this->userInterface->storeUser($request);
        return redirect()->route('user.index')->with('success', 'User Created Successfully.');
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
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //validate the form
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
        ]);
        $this->userInterface->updateUser($request, $user);      
        return redirect()->route('user.index')->with('success', 'User Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function cancel(Request $request){

        return view(
                'users.create',
                [
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => $request->password,
                    "confirmpassword" => $request->confirmpassword,
                    "type" => $request->type,
                    "phone" => $request->phone,
                    "dob" => $request->dob,
                    "address" => $request->address,
                    "image" => $request->profile
                ]
            );
    }
}
