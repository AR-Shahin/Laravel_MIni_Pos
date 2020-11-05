<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_menu'] = 'Dashboard';
    }
    public function index(){
        return view('dashboard',$this->data);
    }
}
