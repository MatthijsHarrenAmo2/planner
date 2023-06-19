<?php

namespace App\Http\Controllers;

use App\Models\Bords;
use App\Models\Workspaces;
use Illuminate\Http\Request;

class ApiBordController extends Controller
{
    public function ShowAll() {
        $bord = Bords::all();
        $bord = $bord->sortBy('positie');
        return view('welcome', ['bord'=>$bord]);
    }
    public function getId($id) { 
        $id = (int)$id;
        return view('newbord', ['bords' => $id]);
    }
    public function Store(Request $request) {
        $findpos = Bords::max('positie');

        if ($findpos == NULL) {
            $pos = 1;
        } else {
            $pos = $findpos+1;
        }
        request()->validate([
            'workspaceid' => 'required',
            'naam' => 'required',
            'beschrijving' => 'required',
        ]);
        Bords::create( 
            [
                'workspaceid' => request('workspaceid'),
                'naam' => request('naam'),
                'beschrijving' => request('beschrijving'),
                'positie' => $pos 
            ]);
        $id = request('workspaceid');
        $id = (int)$id;
        $workspaces = Workspaces::find($id);

        $bord = Bords::where('workspaceid', $id)->get();
        $bord = $bord->sortBy('positie');
        return view('workspace')->with('bord', $bord)->with('workspaces', $workspaces); 
    } 
    public function LoadUpdate($id) {
        $bord = Bords::find($id);
        $bords = Bords::all();

        return view('editbord', ['bords' => $bords, 'bord' => $bord]);
    }
    public function Update(Bords $bord) {
        $id = $bord['workspaceid'];
        $bord->update([
            'naam' => request('naam'),
            'beschrijving' => request('beschrijving'),
        ]);
        $bord = Bords::all();
        $bord = $bord->sortBy('positie');
        $workspace = Workspaces::find($id);
        return view('workspace', ['bord' => $bord, 'workspaces' => $workspace]);
    }
    public function bordUp(Bords $bord){
        $bord1 = Bords::where('positie',$bord['positie']-1)->get()[0];
        $newpos = $bord1['positie'];
        $newpos1 = $bord['positie'];
        $bord1->update([
            'naam' => $bord1['naam'],
            'beschrijving' => $bord1['beschrijving'],
            'positie' => $newpos1
        ]);
        $bord->update([
            'naam' => $bord['naam'],
            'beschrijving' => $bord['beschrijving'],
            'positie' => $newpos
        ]);
        $bord = Bords::all();
        $bord = $bord->sortBy('positie');
        dd($bord);
        $id = $bord[0]['workspaceid'];
        $workspace = Workspaces::find($id);
        return view('workspace', ['bord' => $bord, 'workspaces' => $workspace]);
    }
    public function bordDown(Bords $bord){
        $bord1 = Bords::where('positie',$bord['positie']+1)->get()[0];
        $newpos = $bord1['positie'];
        $newpos1 = $bord['positie'];
        $bord1->update([
            'naam' => $bord1['naam'],
            'beschrijving' => $bord1['beschrijving'],
            'positie' => $newpos1
        ]);
        $bord->update([
            'naam' => $bord['naam'],
            'beschrijving' => $bord['beschrijving'],
            'positie' => $newpos
        ]);
        $bord = Bords::all();
        $bord = $bord->sortBy('positie');
        $id = $bord[0]['workspaceid'];
        $workspace = Workspaces::find($id);
        return view('workspace', ['bord' => $bord, 'workspaces' => $workspace]);
    }
    public function Delete(Bords $dBord, $id) {
        
        $id = (int)$id;
        $dbord = Bords::find($id);
        $workspaceid = $dbord['workspaceid'];
        $workspaces = Workspaces::find($workspaceid); 

        $dbord->delete();
        $sbord = Bords::where('workspaceid', $workspaceid)->get();
        return view('workspace')->with('bord', $sbord)->with('workspaces', $workspaces);
    }
    public function PassId($id) { 
        return view('newbord', ['id' => $id]);
    }
}
