<?php

namespace App\Http\Controllers;
use App\Card;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardsController extends Controller
{
    //

    public function show(){

        $cards = DB::table('cards')->where('user_id', '=', auth()->id())->get();;
        return view('cards')->with("cards",$cards);
    }



    public function store(){
        
        $this->validate(request(),[

            'creditcardnumber' => 'required|unique:cards',
            'cardholdername'   => 'required',
            'expirydate'       => 'required',
            'cvv'              => 'required',
            ]
        );

        //Encrypting Credit Card CVV
        $oldcvv = request('cvv');
        $encryptedcvv = bcrypt($oldcvv);


        $card = new Card;

        $card ->creditcardnumber = request('creditcardnumber');
        $card ->cardholdername   = request('cardholdername');
        $card ->expirydate       = request('expirydate');
        $card ->cvv              = $encryptedcvv;
        $card ->user_id          = auth()->id();

        $card->save();

        return redirect('http://127.0.0.1:8000/cards')->with("success", "card added");
    }

    public function update($id){

        $card = Card::findOrFail($id);

        $oldcvv = request('cvv');
        $encryptedcvv = bcrypt($oldcvv);

        $card ->creditcardnumber = request('creditcardnumber');
        $card ->cardholdername   = request('cardholdername');
        $card ->expirydate       = request('expirydate');
        $card ->cvv              = $encryptedcvv;
        $card ->user_id          = auth()->id();

        $card->save();

        return redirect('http://127.0.0.1:8000/cards')->with("success", "card Updated");
    }
    public function destroy($id)
    {
        $card = Card::findOrFail($id);

        $card->delete();

        return redirect('http://127.0.0.1:8000/cards');
    }
}
