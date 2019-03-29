<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function show(){
        $companies = Company::all();
        return view('companies')->with("companies",$companies);
    }

    public function store(){
        $this->validate(request(), [

            'companyname' => 'required',

            'expirydate' => 'required|date',

            'price' => 'required',

        ]
        );

        // Create and save the insurance 

        $company = new Company;

        $company->companyname = request('companyname');

        $company->expirydate = request('expirydate');

        $company->price = request('price');

        $company->save();

        // Redirect to homepage

        return redirect('http://127.0.0.1:8000/company');
    }
}
