<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class ApiUsersController extends Controller
{
    public function ShowAll() {
        $user = Users::all();
        return view('welcome', ['user'=>$user]);
    }
    public function Show(Users $user) {
        return $user;
    }

    public function Store(Request $request) {
        request()->validate([
            'voornaam' => 'required',
            'achternaam' => 'required',
            'gebruikersnaam' => 'required',
            'wachtwoord' => 'required',
            'email' => 'required',
        ]);
        if(request('tussenvoegsel') == NULL) {
            return Users::create(
                [
                    'voornaam' => request('voornaam'),
                    'tussenvoegsel' => null,
                    'achternaam' => request('achternaam'),
                    'gebruikersnaam' => request('gebruikersnaam'),
                    'wachtwoord' => request('wachtwoord'),
                    'email' => request('email'),
                ]);
        }
        return Users::create(
        [
            'voornaam' => request('voornaam'),
            'tussenvoegsel' => request('tussenvoegsel'),
            'achternaam' => request('achternaam'),
            'gebruikersnaam' => request('gebruikersnaam'),
            'wachtwoord' => request('wachtwoord'),
            'email' => request('email'),
        ]);
    }

    public function Update(Users $user) {
        $user->update([
            'voornaam' => request('voornaam'),
            'tussenvoegsel' => request('tussenvoegsel'),
            'achternaam' => request('achternaam'),
            'gebruikersnaam' => request('gebruikersnaam'),
            'wachtwoord' => request('wachtwoord'),
            'email' => request('email'),
        ]);
        return $user;
    }

    public function Delete(Users $user) {
        $succes = $user;
        $user->delete();
        return $user;
        // if (isset($succes->Tussenvoegsel)){
        //     return $succes->VoorNaam.' '.$succes->Tussenvoegsel.' '.$succes->AchterNaam.' verwijderd';
        // }
        // return "Usersslid ".$succes->VoorNaam.' '.$succes->AchterNaam.' verwijderd';
    }
}
