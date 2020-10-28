<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class UserGroupsController extends Controller
{
    public function groups(){
        $this->data['groups'] = Group::latest()->get();
        return view('group.index',$this->data);
    }
    public function store(Request $request){
        $request->validate([
            'title' => ['required','string','unique:groups'],
        ]);
        $group = new Group();
        $group->title = ucwords($request->title);
        if($group->save()){
            $this->setSuccessMessage('Group Added Successfully!');
            return redirect()->back();
        }
    }
    public function update(Request $request,$id){
        $request->validate([
            'title' => ['required','string','unique:groups'],
        ]);
        $up = Group::find($id)->update([
            'title' => $request->title,
        ]);
      if($up){
        $this->setSuccessMessage('Group Updated Successfully!');
        return redirect()->back();
      }
    }
    public function destroy($id){
        $del = Group::find($id)->delete();
      if($del){
        $this->setSuccessMessage('Group Deleted Successfully!');
        return redirect()->back();
      }
    }

}
