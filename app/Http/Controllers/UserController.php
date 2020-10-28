<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['groups'] = Group::latest()->get();
        $this->data['users'] = User::latest()->get();
        return view('user.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['groups'] = Group::latest()->get();
        return view('user.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_id' => ['required'],
            'name' => ['required','string'],
            'email' => ['required','email','unique:users'],
            'phone' => ['required','Integer'],
            'address' => ['required','string'],
        ]);
        $user = new User();
        $user->group_id = $request->group_id;
        $user->admin_id = 1;
        $user->name = ucwords($request->name);
        $user->email = strtolower($request->email);
        $user->phone = $request->phone;
        $user->address = ucwords($request->address);
        if($user->save()){
            $this->setSuccessMessage('User Added Successfully!');
            return redirect()->route('users.index');
        }
    }
     	

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $this->data['users'] = User::findorFail($id);
        return view('user.show',$this->data);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'group_id' => ['required'],
            'name' => ['required','string'],
            'email' => ['required','email'],
            'phone' => ['required','Integer'],
            'address' => ['required','string'],
        ]);
        $user = User::find($id);
        $user->group_id = $request->group_id;
        $user->admin_id = 1;
        $user->name = ucwords($request->name);
        $user->email = strtolower($request->email);
        $user->phone = $request->phone;
        $user->address = ucwords($request->address);
        if($user->save()){
            $this->setSuccessMessage('User Updated Successfully!');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id)->delete()){
            $this->setSuccessMessage('User Deleted Successfully!');
            return redirect()->back();
        }
    }
}
