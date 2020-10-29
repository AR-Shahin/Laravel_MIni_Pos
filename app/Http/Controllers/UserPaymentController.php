<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserPaymentController extends Controller
{
    public function index( $id )
    {
        $this->data['user'] 	= User::findOrFail($id);
        $this->data['tab_menu'] = 'payment';
    	return view('user.payment.payment', $this->data);
    }
    
}
