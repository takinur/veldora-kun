<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.users.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {


        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id . ''],
            'phone' => ['required', 'string', 'max:255'],
        ]);

        $appr = '';

        if ($request->approval == 1) {
            $appr = now();
        } else {
            $appr = null;
        }
        //Find and Update User
        User::find($user->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'approved_at' => $appr,

            ]);

        //Send Success Messsage
        session()->flash('message', 'User Edited successfully!');

        return redirect()->route('users.index');
    }

    /**
     * Show the form for Creating the specified resource.
     *
     *
     */

    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validate Inputs
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['string', 'max:255'],
            'role' => 'required|in:admin,customer,driver', //Accept only 3 Role
        ]);


        //Create New User
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make('password'),
            'approved_at' => now(), //Already Approved
        ]);

        //Assign Role
        $user->assignRole($request['role']);

        //Sent Passowrd Reset Link
        $token = Password::getRepository()->create($user);
        $user->sendPasswordResetNotification($token);

        //Success Message
        session()->flash('message', 'User created successfully!');

        return redirect()->route('users.index');
    }
}
