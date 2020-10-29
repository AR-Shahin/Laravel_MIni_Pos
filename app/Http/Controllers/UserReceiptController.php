<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserReceiptController extends Controller
{
    public function index( $id )
    {
        $this->data['user'] 	= User::findOrFail($id);
        $this->data['tab_menu'] = 'receipt';
    	return view('user.receipt.receipt', $this->data);
    }
}
