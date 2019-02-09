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

            'vin' => 'required',

            'expirydate' => 'required|date',

            'company' => 'required',

            'model' => 'required',

            'year' => 'required',

            'color' => 'required',

            'registrationtype' => 'required',

            'platenumber' => 'required'

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

        $user->vin = request('vin');

        $user->expirydate = request('expirydate');

        $user->company = request('company');

        $user->model = request('model');

        $user->year = request('year');

        $user->color = request('color');

        $user->registrationtype = request('registrationtype');

        $user->platenumber = request('platenumber');

        $user->save();

        // Sign them in

        auth()->login($user);

        // Redirect to homepage

        return redirect('http://127.0.0.1:8000/');
    }
}
