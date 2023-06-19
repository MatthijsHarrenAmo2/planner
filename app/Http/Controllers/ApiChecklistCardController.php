<?php

namespace App\Http\Controllers;

use App\Models\Checklist_Cards;
use Illuminate\Http\Request;

class ApiChecklistCardController extends Controller
{
    public function ShowAll() {
        $cc = Checklist_Cards::all();
        return view('welcome', ['checklistcards'=>$cc]);
    }
    public function Show($id) {
        return Checklist_Cards::find($id);
    }

    public function Store(Request $request) {
        request()->validate([
            'cardsid' => 'required',
            'checklistsid' => 'required',
        ]);
        return Checklist_Cards::create(
        [
            'cardsid' => request('cardsid'),
            'checklistsid' => request('checklistsid'),
        ]);
    }

    public function Update($id) {
        $edit = Checklist_Cards::find($id);
        $edit->update([
            'cardsid' => request('cardsid'),
            'checklistsid' => request('checklistsid'),
        ]);
        return $edit;
    }

    public function Delete($id) {
        $edit = Checklist_Cards::find($id);
        $succes = $edit;
        $edit->delete();
        return $succes;
    }
}
