<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request; 
use App\Models\Bords;
use App\Models\Workspaces;

class ApiListController extends Controller
{
    public function ShowAll() {
        $list = Lists::all();
        return view('bord', ['list'=>$list]);
    }
    public function Show(Lists $list, $id) {
        $id = (int)$id;
        $bord = Bords::find($id); 
        $workspace = Workspaces::find($bord['workspaceid']);
        $list = Lists::where('bordid', $id)->get();
        $list = $list->sortBy('positie');
        return view('bord')->with('list', $list)->with('bord', $bord)->with('workspace', $workspace); 
    }
    public function ShowWIP(Lists $list, $id) {
        $id = (int)$id;
        $bord = Bords::find($id); 
        $workspace = Workspaces::find($bord['workspaceid']);
        $list = Lists::where('bordid', $id)->get();
        $list = $list->sortBy('positie');
        return view('bordWIP')->with('list', $list)->with('bord', $bord)->with('workspace', $workspace); 
    }
    public function ShowNNB(Lists $list, $id) {
        $id = (int)$id;
        $bord = Bords::find($id); 
        $workspace = Workspaces::find($bord['workspaceid']);
        $list = Lists::where('bordid', $id)->get();
        $list = $list->sortBy('positie');
        return view('bordNNB')->with('list', $list)->with('bord', $bord)->with('workspace', $workspace); 
    }
    public function ShowAF(Lists $list, $id) {
        $id = (int)$id;
        $bord = Bords::find($id); 
        $workspace = Workspaces::find($bord['workspaceid']);
        $list = Lists::where('bordid', $id)->get();
        $list = $list->sortBy('positie');
        return view('bordAF')->with('list', $list)->with('bord', $bord)->with('workspace', $workspace); 
    }
    public function ShowSingle($id) { 
        $id = (int)$id;
        $list = Lists::find($id);
        return view('list', ['list' => $list]);
    }
    public function Store(Request $request) {
        $findpos = Lists::max('positie');

        if ($findpos == NULL) {
            $pos = 1;
        } else {
            $pos = $findpos+1;
        }
        $status = (int)request('status');
        $list = Lists::create(
            [ 
                'bordid' => request('bordid'),
                'naam' => request('naam'),
                'beschrijving' => request('beschrijving'),
                'status' => $status, 
                'positie' => $pos
            ]);
            $id = request('bordid');
            $id = (int)$id;
            $bord = Bords::find($id);
            $list = Lists::where('bordid', $id)->get();
            $list = $list->sortBy('positie');
            return view('bord')->with('list', $list)->with('bord', $bord); 
    }
    public function LoadUpdate($id) {
        $list = Lists::find($id);
        $lists = Lists::all();
        return view('editlist', ['lists' => $lists, 'list' => $list]);
    }
    public function Update(Lists $list) {
        $status = (int)request('status');
        if($status == null) {
            $status = $list->status;
        }
        $id = $list->bordid;
        $list->update([
            'bordid' => request('bordid'),
                'naam' => request('naam'),
                'beschrijving' => request('beschrijving'), 
                'status' => $status,
        ]);
        $bord = Bords::find($id);
        $list = Lists::where('bordid', $id)->get();
        $list = $list->sortBy('positie');
        return view('bord', ['list' => $list, 'bord' => $bord]);
    }
    public function ListUp(Lists $list){
        $id = $list['bordid'];
        $list1 = Lists::where('positie',$list['positie']-1)->get()[0];
        $newpos = $list1['positie'];
        $newpos1 = $list['positie'];
        $list1->update([
            'naam' => $list1['naam'],
            'beschrijving' => $list1['beschrijving'],
            'positie' => $newpos1
        ]);
        $list->update([
            'naam' => $list['naam'],
            'beschrijving' => $list['beschrijving'],
            'positie' => $newpos
        ]);
        $list = Lists::where('bordid',$id)->get();
        $list = $list->sortBy('positie');
        $id = $list[0]['bordid'];
        $bord = Bords::find($id);
        $id2 = $bord['workspaceid'];
        $workspace = Workspaces::find($id2);
        return view('bord', ['list' => $list, 'bord' => $bord, 'workspace' => $workspace]);
    }
    public function ListDown(Lists $list){
        $id = $list['bordid'];
        $list1 = Lists::where('positie',$list['positie']+1)->get()[0];
        $newpos = $list1['positie'];
        $newpos1 = $list['positie'];
        $list1->update([
            'naam' => $list1['naam'],
            'beschrijving' => $list1['beschrijving'],
            'positie' => $newpos1
        ]);
        $list->update([
            'naam' => $list['naam'],
            'beschrijving' => $list['beschrijving'],
            'positie' => $newpos
        ]);
        $list = Lists::where('bordid',$id)->get();
        $list = $list->sortBy('positie');
        $id = $list[0]['bordid'];
        $bord = Bords::find($id);
        $id2 = $bord['workspaceid'];
        $workspace = Workspaces::find($id2);
        return view('bord', ['list' => $list, 'bord' => $bord, 'workspace' => $workspace]);
    }
    public function Delete(Lists $list) {
        $bordid = $list['bordid'];
        $bord = Bords::find($bordid); 

        $list->delete();
        $nlist = Lists::where('bordid', $bordid)->get();
        $list = $nlist->sortBy('positie');
        return view('bord')->with('list', $list)->with('bord', $bord);
    }
    public function PassId($id) {
        return view('newlist', ['id' => $id]);
    }
}
