<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserSalesController extends Controller
{
    public function index( $id )
    {
        $this->data['user'] 	= User::findOrFail($id);
        $this->data['tab_menu'] = 'sales';
    	return view('user.sales.sales', $this->data);
    }
}
