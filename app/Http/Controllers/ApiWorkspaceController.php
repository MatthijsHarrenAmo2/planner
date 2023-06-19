<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Workspaces;
use App\Models\Bords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ApiWorkspaceController extends Controller
{
    public function ShowAll() {
        $workspaces = Workspaces::all();
        $workspaces = $workspaces->sortBy('positie');
        return view('welcome', ['workspaces' => $workspaces]);
    }
    public function ShowName($id) {
        $id = (int)$id;
        $workspaces = Workspaces::find($id); 

        $bord = Bords::where('workspaceid', $id)->get();
        $bord = $bord->sortBy('positie');
        return view('workspace')->with('bord', $bord)->with('workspaces', $workspaces); 

    } 
    public function Show(Workspaces $workspace, $id) {
        $id = (int)$id;
        $workspaces = Workspaces::find($id);
        return view('workspace', ['workspaces' => $workspaces]);
    }

    public function Store(Request $request) {
        $findpos = Workspaces::max('positie');

        if ($findpos == NULL) {
            $pos = 1;
        } else {
            $pos = $findpos+1;
        }
        $workspaces = Workspaces::create(
        [
            'naam' => request('naam'),
            'beschrijving' => request('beschrijving'),
            'positie' => $pos
        ]);

        $workspaces = Workspaces::all();
        return view('welcome', ['workspaces' => $workspaces]);
    }

    public function LoadUpdate($id) { 
        $workspace = Workspaces::find($id);
        $workspaces = Workspaces::all();
        $workspaces = $workspaces->sortBy('positie');
        return view('editworkspace', ['workspaces' => $workspaces, 'workspace' => $workspace]);
    }
    public function Update(Workspaces $workspace) {
        $workspace->update([
            'naam' => request('naam'),
            'beschrijving' => request('beschrijving'),
        ]);
        $workspaces = Workspaces::all();
        return view('welcome', ['workspaces' => $workspaces]);
    }
    
    public function workspaceUp(Workspaces $workspace){
        $workspace1 = Workspaces::where('positie',$workspace['positie']-1)->get()[0];
        $newpos = $workspace1['positie'];
        $newpos1 = $workspace['positie'];
        $workspace1->update([
            'naam' => $workspace1['naam'],
            'beschrijving' => $workspace1['beschrijving'],
            'positie' => $newpos1
        ]);
        $workspace->update([
            'naam' => $workspace['naam'],
            'beschrijving' => $workspace['beschrijving'],
            'positie' => $newpos
        ]);
        $workspaces = Workspaces::all();
        $workspaces = $workspaces->sortBy('positie');
        return view('welcome', ['workspaces' => $workspaces]);
    }
    public function workspaceDown(Workspaces $workspace){
        $workspace1 = Workspaces::where('positie',$workspace['positie']+1)->get()[0];
        $newpos = $workspace1['positie'];
        $newpos1 = $workspace['positie'];
        $workspace1->update([
            'naam' => $workspace1['naam'],
            'beschrijving' => $workspace1['beschrijving'],
            'positie' => $newpos1
        ]);
        $workspace->update([
            'naam' => $workspace['naam'],
            'beschrijving' => $workspace['beschrijving'],
            'positie' => $newpos
        ]);
        $workspaces = Workspaces::all();
        $workspaces = $workspaces->sortBy('positie');
        return view('welcome', ['workspaces' => $workspaces]);
    }



    public function Delete(Workspaces $workspace) {
        $workspace->delete();
        $workspaces = Workspaces::all();
        $workspaces = $workspaces->sortBy('positie');
        return view('welcome', ['workspaces' => $workspaces]);
    } 
}
