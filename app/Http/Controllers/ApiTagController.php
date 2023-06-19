<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;

class ApiTagController extends Controller
{
    public function ShowAll() {
        $tag = Tags::all();
        return view('welcome', ['tag'=>$tag]);
    }
    public function Show(Tags $Tag) {
        return $Tag; 
    }

    public function Store(Request $request) {
        request()->validate([
            'naam' => 'required',
            'kleur' => 'required',
        ]);
        return Tags::create(
        [
            'naam' => request('naam'),
            'kleur' => request('kleur'),
        ]);
    }

    public function Update(Tags $Tag) {
        $Tag->update([
            'naam' => request('naam'),
            'kleur' => request('kleur'),
        ]);
        return $Tag;
    }

    public function Delete(Tags $Tag) {
        $succes = $Tag;
        $Tag->delete();
        return $Tag;
    }
}
