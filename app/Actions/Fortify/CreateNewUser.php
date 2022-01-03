<?php

namespace App\Actions\Fortify;

use App\Mail\EmailNewUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'role' => 'required|in:customer,driver', //Accept only 2 Role
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);

        $user->assignRole($input['role']);

        //Send New Mail Notification

        //Return admin EMAIL
        $admin = User::find(1);

        $mailData = [
            'title' => 'Hi, a new user has registered!',
            'text' => 'Login to admin panel and Approve the user! <br> Name: ' . $input['name'] . '<br>Registered as an '. $input['role'] . '!',
            'url' => '',
        ];

        Mail::to($admin->email)->send(new EmailNewUser($mailData));

        //For User
        $mailData = [
            'title' => 'Hi '.  $input['name'].', thank you for Choosing MoscowCourier!',
            'text' => 'Allow some time for administrator to approve your account!',
        ];

        Mail::to($input['email'])->send(new EmailNewUser($mailData));

        return $user;
    }
}
