<?php

namespace App\Http\Controllers;

use App\Models\Tag_Cards;
use Illuminate\Http\Request;

class ApiTagCardController extends Controller
{
    public function ShowAll() {
        $tc = Tag_Cards::all();
        return view('welcome', ['tc'=>$tc]);
    }
    public function Show($id) {
        return Tag_Cards::find($id);
    }

    public function Store(Request $request) {
        request()->validate([
            'cardsid' => 'required',
            'tagsid' => 'required',
        ]);

        return Tag_Cards::create(
        [
            'cardsid' => request('cardsid'),
            'tagsid' => request('tagsid'),
        ]);
    }

    public function Update($id) {
        $edit = Tag_Cards::find($id);
        $edit->update([
            'cardsid' => request('cardsid'),
            'tagsid' => request('tagsid'),
        ]);
        return $edit;
    }

    public function Delete($id) {
        $edit = Tag_Cards::find($id);
        $edit->delete();
        return $edit;
    }
}
