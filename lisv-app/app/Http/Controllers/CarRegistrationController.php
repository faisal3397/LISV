<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Illuminate\Support\Facades\DB;
use Notification;
use App\Notifications\RegistrationExpiry;
use Carbon\Carbon;
use DateTime;
use App\User;

class CarRegistrationController extends Controller
{

    public function show(){
        $date = Carbon::now('Asia/Riyadh');
        $registrations = DB::table('registrations')->where('user_id', '=', auth()->id())->get();

        $registration = DB::table('registrations')->where('user_id', '=', auth()->id())->first();
        if(count($registrations) > 0){
            $first = new DateTime($registration->expirydate); //registration expiry date
            $second = new DateTime($date->format('Y-m-d')); // the current date but in the format yyyy-mm-dd
            $interval = $first->diff($second); //difference between registration expiry date and current date
            $days = $interval->format('%a'); //we need it in this format so that we can calculate the difference in days

            if($days <= 30){ //if registration expiry date is in a month or less, update.
                $users = User::where('id', auth()->id())->get();
                Notification::send($users, new RegistrationExpiry($registration));
            }
        }
        return view('carRegistration') ->with("registrations",$registrations);
    }

    public function updateForm(){
        $registrations = DB::table('registrations')->where('user_id', '=', auth()->id())->get();
        return view('updateRegistration')->with("registrations",$registrations);
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

        return redirect('http://127.0.0.1:8000/');
    }


    public function update($id){
        $date = Carbon::now('Asia/Riyadh');
        $dateAfter1Year = $date->addYear();
        $formattedDate = $dateAfter1Year->format('Y-m-d'); 

        $registration = Registration::findOrFail($id);


        $registration->expirydate = $formattedDate;


        $registration ->user_id = auth()->id();


        $registration->save();

        return redirect('http://127.0.0.1:8000/carRegistration')->with("success", "registration Updated, the amount of money paid is 100 SAR");
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);

        $registration->delete();

        return redirect('http://127.0.0.1:8000/carRegistration');
    }
}
