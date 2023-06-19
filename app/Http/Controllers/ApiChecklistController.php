<?php

namespace App\Http\Controllers;

use App\Models\Checklists;
use Illuminate\Http\Request;

class ApiChecklistController extends Controller
{
    public function ShowAll() {
        $checklist = Checklists::all();
        return view('welcome', ['checklist'=>$checklist]);
    }
    public function Show(Checklists $Checklist) {
        return $Checklist;
    }

    public function Store(Request $request) {
        request()->validate([
            'naam' => 'required',
            'afgerond' => 'required',
        ]);
        return Checklists::create(
        [
            'naam' => request('naam'),
            'afgerond' => request('afgerond'),
        ]);
    }

    public function Update(Checklists $Checklist) {
        $Checklist->update([
            'naam' => request('naam'),
            'afgerond' => request('afgerond'),
        ]);
        return $Checklist;
    }

    public function Delete(Checklists $Checklist) {
        $succes = $Checklist;
        $Checklist->delete();
        return $Checklist;
    }
}
