<?php

namespace App\Http\Controllers;

use App\Models\Bericht_Cards;
use Illuminate\Http\Request;

class ApiBerichtCardController extends Controller
{
    public function ShowAll() {
        $bc = Bericht_Cards::all();
        return view('welcome', ['berichtcard'=>$bc]);
    }
    public function Show($id) {
        return Bericht_cards::find($id);
    }

    public function Store() {
        request()->validate([
            'cardsid' => 'required',
            'berichtenid' => 'required',
        ]);
        return Bericht_Cards::create(
        [
            'cardsid' => request('cardsid'),
            'berichtenid' => request('berichtenid'),
        ]
    );
    }

    public function Update($id) {
        $edit = Bericht_cards::find($id);
        request()->validate([
            'cardsid' => 'required',
            'berichtenid' => 'required',
        ]);
        $edit->update([
            'cardsid' => request('cardsid'),
            'berichtenid' => request('berichtenid'),
        ]);
        return $edit;
    }

    public function Delete($id) {
        $edit= Bericht_cards::find($id);
        $succes = $edit;
        $edit->delete();
        return $succes;
    }
}
