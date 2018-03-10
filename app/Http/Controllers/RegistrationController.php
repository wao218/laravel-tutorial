<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    //
    public function create() {

        return view('registration.create');

    }

    public function store() {

       // validate the form
       
        $this->validate(request(), [

            'name' => 'required',

            'email' => 'required|email',

            'password' => 'required|confirmed'

        ]);

       // Create and Save the User

       $user = User::create([

        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password'))

       ]);

       // Sign them in

       auth()->login($user);

       // Redirect to the Home Page

       return redirect()->home();
    }
}
