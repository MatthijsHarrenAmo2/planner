<?php

namespace App\Http\Controllers;

use App\Models\Users_workspaces;
use Illuminate\Http\Request;

class ApiUserWorkspaceController extends Controller
{
    public function ShowAll() {
        $uw = Users_Workspaces::all();
        return view('welcome', ['uw'=>$uw]);
    }
    public function Show($id) {
        return Users_Workspaces::find($id);
    }

    public function Store(Request $request) {
        request()->validate([
            'voornaam' => 'required',
            'achternaam' => 'required',
        ]);
        return Users_workspaces::create(
        [
            'voornaam' => request('voornaam'),
            'achternaam' => request('achternaam'),
        ]);
    }

    public function Update($id) {
        $edit = Users_Workspaces::find($id);
        $edit->update([
            'voornaam' => request('voornaam'),
            'achternaam' => request('achternaam'),
        ]);
        return $edit;
    }

    public function Delete($id) {
        $edit = Users_Workspaces::find($id);
        $succes = $edit;
        $edit->delete();
        return $succes;
    }
}
