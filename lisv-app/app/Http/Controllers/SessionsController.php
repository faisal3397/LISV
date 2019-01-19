<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //

    public function __construct(){
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function show(){
        return view('login');
    }

    public function store(){
        
       // Authenticate the user 

       if(! auth()->attempt(request(['email','password']))){

           return back()->withErrors([
               'message' => 'Please check your credentials'
           ]); 
           
       } 

       
       return redirect()->home();
    }

    public function destroy(){
        auth()->logout();

        return redirect()->home();
    }
}
