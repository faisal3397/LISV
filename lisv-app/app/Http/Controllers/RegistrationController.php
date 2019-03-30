<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    //
    public function show(){

        return view('register');
    }

    public function store(){

        // Validate the form
       
        
         
        $this->validate(request(), [

            'name' => 'required',

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

        $user->name = request('name');
        
        $user->phonenumber = request('phonenumber');

        $user->email = request('email');

        $user->password = $password;

        $user->save();

        // Sign them in

        auth()->login($user);

        // Redirect to Car Registration

        return redirect('http://127.0.0.1:8000/addRegistration');
    }

    
}
