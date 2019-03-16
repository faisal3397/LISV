<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Illuminate\Support\Facades\DB;
use Notification;
use App\Notifications\RegistrationExpiry;
use Carbon\Carbon;
use App\User;

class CarRegistrationController extends Controller
{

    public function show(){
        $date = Carbon::now('Asia/Riyadh');
        $registrations = DB::table('registrations')->where('user_id', '=', auth()->id())->get();

        $registration = DB::table('registrations')->where('user_id', '=', auth()->id())->first();
        var_dump($registration);
        if(count($registrations) > 0){
            if($date->format('Y-m-d') > ($registration->expirydate)){
                $users = User::where('id', auth()->id())->get();
                Notification::send($users, new RegistrationExpiry($registration));
            }
        }
        return view('carRegistration') ->with("registrations",$registrations);
    }

    public function store(){

        // Validate the form
       
        
         
        $this->validate(request(), [

            'vin' => 'required|unique:registrations',

            'expirydate' => 'required|date',

            'company' => 'required',

            'model' => 'required',

            'year' => 'required',

            'color' => 'required',

            'registrationtype' => 'required',

            'platenumber' => 'required'

        ]
        );

        // Create and save the registration 

        $registration = new Registration;

        $registration->vin = request('vin');

        $registration->expirydate = request('expirydate');

        $registration->company = request('company');

        $registration->model = request('model');

        $registration->year = request('year');

        $registration->color = request('color');

        $registration->registrationtype = request('registrationtype');

        $registration->platenumber = request('platenumber');

        $registration->user_id = auth()->id();

        $registration->save();

        // Redirect to homepage

        return redirect('http://127.0.0.1:8000/carRegistration');
    }


    public function update($id){

        $registration = Registration::findOrFail($id);

        $registration->vin = request('vin');

        $registration->expirydate = request('expirydate');

        $registration->company = request('company');

        $registration->model = request('model');

        $registration->year = request('year');

        $registration->color = request('color');

        $registration->registrationtype = request('registrationtype');

        $registration->platenumber = request('platenumber');

        $registration ->user_id = auth()->id();


        $registration->save();

        return redirect('http://127.0.0.1:8000/carRegistration')->with("success", "registration Updated");
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);

        $registration->delete();

        return redirect('http://127.0.0.1:8000/carRegistration');
    }
}
