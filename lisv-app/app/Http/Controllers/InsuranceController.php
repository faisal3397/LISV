<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insurance;
use Illuminate\Support\Facades\DB;
use Notification;
use App\Notifications\InsuranceOffer;
use Carbon\Carbon;
use App\User;

class InsuranceController extends Controller
{
    //
    public function show(){
        $date = Carbon::now('Asia/Riyadh');
        $insurances = DB::table('insurances')->where('user_id', '=', auth()->id())->get();

        $insurance = DB::table('insurances')->where('user_id', '=', auth()->id())->first();
        var_dump($insurance);
        // if(count($insurances) > 0){
        //     if($date->format('Y-m-d') > ($insurance->expirydate)){
        //     $users = User::where('id', auth()->id())->get();
        //     Notification::send($users, new InsuranceOffer($insurance));
        //     } 
        // }

        return view('insurance')->with("insurances",$insurances);
    }

    public function showOffer(){

        $insurances = DB::table('insurances')->where('user_id', '=', auth()->id())->get();
        $insuranceOffer = DB::table('companies')->orderBy('price')->first();
        return view('insuranceUpdate')->with("insuranceOffer",$insuranceOffer)->with("insurances",$insurances);
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


    public function update($id){

        $insurance = Insurance::findOrFail($id);
        
        $insurance->companyname = request('companyname');

        $insurance->expirydate = request('expirydate');

        $insurance->car = request('car');

        $insurance->year = request('year');

        $insurance->policynumber = request('policynumber');

        $insurance->platenumber = request('platenumber');

        $insurance->user_id = auth()->id();

        $insurance->save();

        return redirect('http://127.0.0.1:8000/insurance')->with("success", "Insurance Updated");
    }

    public function destroy($id)
    {
        $insurance = Insurance::findOrFail($id);

        $insurance->delete();

        return redirect('http://127.0.0.1:8000/insurance');
    }
}
