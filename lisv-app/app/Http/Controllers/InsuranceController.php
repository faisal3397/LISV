<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insurance;
use Illuminate\Support\Facades\DB;
use Notification;
use App\Notifications\InsuranceOffer;
use Carbon\Carbon;
use App\User;
use App\Company;
use DateTime;

class InsuranceController extends Controller
{
    //
    public function show(){
        $date = Carbon::now('Asia/Riyadh');
        $insurances = DB::table('insurances')->where('user_id', '=', auth()->id())->get();

        $insurance = DB::table('insurances')->where('user_id', '=', auth()->id())->first();
        if(count($insurances) > 0){
            $first = new DateTime($insurance->expirydate); //insurance expiry date
            $second = new DateTime($date->format('Y-m-d')); // the current date but in the format yyyy-mm-dd
            $interval = $first->diff($second); //difference between insurance expiry date and current date
            $days = $interval->format('%a'); //we need it in this format so that we can calculate the difference in days

            if($days <= 30){
                $users = User::where('id', auth()->id())->get();
                Notification::send($users, new InsuranceOffer($insurance));
            } 
        }

        return view('insurance')->with("insurances",$insurances);
    }

    public function showOffer(){

        $insurances = DB::table('insurances')->where('user_id', '=', auth()->id())->get();
        $insuranceOffers = DB::table('companies')->orderBy('price')->get();
        return view('insuranceOffer')->with("insuranceOffers",$insuranceOffers)->with("insurances",$insurances);
    }

    public function updateForm(){
        $insurance = DB::table('insurances')->where('user_id', '=', auth()->id())->first();
        $insuranceOffers = DB::table('companies')->orderBy('price')->get();
        return view('updateInsurance')->with("insurance",$insurance)->with("insuranceOffers",$insuranceOffers);
    }

    public function store(){

        // Validate the form
       
        
         
        $this->validate(request(), [

            'companyname' => 'required',

            'expirydate' => 'required|date',

            'car' => 'required',

            'year' => 'required',

            'platenumber' => 'required',

            'policynumber' => 'required|unique:insurances',

        ]
        );

        // Create and save the insurance 

        $insurance = new Insurance;

        $insurance->companyname = request('companyname');

        $insurance->expirydate = request('expirydate');

        $insurance->car = request('car');

        $insurance->year = request('year');

        $insurance->policynumber = request('policynumber');

        $insurance->platenumber = request('platenumber');

        $insurance->user_id = auth()->id();

        $insurance->save();

        // Redirect to homepage

        return redirect('http://127.0.0.1:8000/insurance');
    }

    public function storeOffer($id){
        $offerID = Company::findOrFail($id); 
        $carRegistration = DB::table('registrations')->where('user_id', '=', auth()->id())->first();
        // dd($carRegistration->model);
        $insurance = new Insurance;

        $insurance->companyname = $offerID->companyname;

        $insurance->expirydate = $offerID->expirydate;

        $insurance->car = $carRegistration->model;

        $insurance->year = $carRegistration->year;

        $insurance->policynumber = $string = str_random(15);

        $insurance->platenumber = $carRegistration->platenumber;

        $insurance->user_id = auth()->id();

        $insurance->save();

        return redirect('http://127.0.0.1:8000/insurance')->with("success", "Insurance Added");
    }


    public function update($id, $id1){

        $offerID = Company::findOrFail($id);
        $insurance = Insurance::findOrFail($id1);
        

        $insurance->companyname = $offerID->companyname;

        $insurance->expirydate = $offerID->expirydate;

        $insurance->policynumber= $string = str_random(15);

        $insurance->user_id = auth()->id();

        $insurance->save();

        return redirect('http://127.0.0.1:8000/insurance')->with("success", "Insurance Updated, the amount of money paid is {$offerID->price} SAR");
    }

    public function destroy($id)
    {
        $insurance = Insurance::findOrFail($id);

        $insurance->delete();

        return redirect('http://127.0.0.1:8000/insurance');
    }
}
