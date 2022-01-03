<?php

namespace App\Http\Controllers;

use App\Mail\EmailContact;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactForm()
    {
        return view('contactForm');
    }

    public function storeContactForm(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $input = $request->all();

        //Store Messages
        Contact::create($input);

        //Return admin EMAIL
        $user = User::find(1);
        $email = $user->email;

        $mailData = [
            'title' => 'Contact Message!',
            'name' => $input['name'],
            'email' => $input['email'],
            'message' => $input['message'],
            //'url' => 'Contact'
        ];

        Mail::to($email)->send(new EmailContact($mailData));

        session()->flash('message', 'Message sent Successfully. Thanks');

        return redirect()->back();
    }
}
