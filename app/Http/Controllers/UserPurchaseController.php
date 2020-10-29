<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserPurchaseController extends Controller
{
    public function index( $id )
    {
        $this->data['user'] 	= User::findOrFail($id);
        $this->data['tab_menu'] = 'purchase';
    	return view('user.purchase.purchase', $this->data);
    }
}
