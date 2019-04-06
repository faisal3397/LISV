<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Car;

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

        //Register the user's car 
        $car = new Car;

        $car->user_id = auth()->id();
        $car->doors = 'Doors are Closed';
        $car->vehicle = 'Vehicle is Off';

        $car->save();

        // Redirect to Car Registration

        return redirect('http://127.0.0.1:8000/addRegistration');
    }

    
}
