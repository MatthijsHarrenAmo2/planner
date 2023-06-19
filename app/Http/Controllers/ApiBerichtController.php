<?php

namespace App\Http\Controllers;

use App\Models\Berichten;
use Illuminate\Http\Request;

class ApiBerichtController extends Controller
{
    public function ShowAll() {
        $bericht = Berichten::all();
        return view('welcome', ['bericht'=>$bericht]);
    }
    public function Show(Berichten $bericht) {
        return $bericht;
    }

    public function Store(Request $request) {
        request()->validate([
            'userid' => 'required',
            'bericht' => 'required',
        ]);
        return Berichten::create(
        [
            'userid' => request('userid'),
            'bericht' => request('bericht'),
        ]);
    }

    public function Update(Berichten $bericht) {
        $bericht->update([
            'userid' => request('userid'),
            'bericht' => request('bericht'),
        ]);
        return $bericht;
    }

    public function Delete(Berichten $bericht) {
        $succes = $bericht;
        $bericht->delete();
        return $bericht;
    }
}
