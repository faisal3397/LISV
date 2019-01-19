<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //
    public function show(){

        return view('register');
    }

    public function store(){

        // Validate the form
       
        
         
        $this->validate(request(), [

            'email' => 'required|unique:users',

            'phonenumber' => 'required',

            'password' => 'required|confirmed',

        ]
    );

        // Encrypt the password
        $pass = request('password'); // get the password
        $password = bcrypt($pass);  // encrypt
        // Create and save the user 

        $user = new User;
        
        $user->phonenumber = request('phonenumber');

        $user->email = request('email');

        $user->password = $password;

        $user->save();

        // Sign them in

        auth()->login($user);

        // Redirect to homepage

        return redirect()->home();
    }
}
