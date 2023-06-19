<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\Http\Request;

class ApiCardsController extends Controller
{
    public function ShowAll() {
        $card = Cards::all();
        return view('welcome', ['card'=>$card]);
    }
    public function Show(Cards $card) {
        return $card;
    }

    public function Store(Request $request) {
        request()->validate([
            'workspaceid' => 'required',
            'naam' => 'required',
            'beschrijving' => 'required',
        ]);
        return Cards::create(
        [
            'workspaceid' => request('workspaceid'),
            'naam' => request('naam'),
            'beschrijving' => request('beschrijving'),
        ]);
    }

    public function Update(Cards $card) {
        $card->update([
            'workspaceid' => request('workspaceid'),
            'naam' => request('naam'),
            'beschrijving' => request('beschrijving'),
        ]);
        return $card;
    }

    public function Delete(Cards $card) {
        $succes = $card;
        $card->delete();
        return $card;
    }
}
