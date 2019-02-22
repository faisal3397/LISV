<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shops;
use App\User;
use Notification;
use App\Notifications\NewSales;

class ShopsController extends Controller
{
    //

    public function show(){
        $shops = Shops::all();

        return view('shops')->with('shops', $shops);

    }

    public function store(){

        $this->validate(request(), [
            'shopname' => 'required',
            'begindate' => 'required',
            'enddate' => 'required'
        ]);


        $shop = new Shops;

        $shop->shopname = request('shopname');
        $shop->begindate = request('begindate');
        $shop->enddate = request('enddate');

        $shop->save();

        $users = User::all();
        Notification::send($users, new NewSales($shop));

        return redirect('http://127.0.0.1:8000/shops')->with("success","Shop Added");
    }
}
