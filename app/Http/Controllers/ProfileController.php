<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Contracts\Services\User\UserServiceInterface;

class ProfileController extends Controller
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
     * Display login user detail
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $profile = Auth::user()->profile;
        $name = Auth::user()->name;
        $t = Auth::user()->type;
        if ($t == 0) {
            $type = 'Admin';
        } else {
            $type = 'User';
        }
        $email = Auth::user()->email;
        $phone = Auth::user()->phone;
        $dob = Auth::user()->dob;
        $email = Auth::user()->email;
        $address = Auth::user()->address;
        return view(
            'profile.index',
            [
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "type" => $type,
                "phone" => $phone,
                "dob" => $dob,
                "address" => $address,
                "profile" => $profile
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \App\Models\User $user
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
        $this->userInterface->updateProfileUser($request, $user);
        return redirect()->route('profile.index')->with('success', 'User Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
