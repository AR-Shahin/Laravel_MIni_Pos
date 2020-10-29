<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public $data = [];
    public function __construct()
    {
    	//$this->data['main_manu'] = 'Users';
    	//$this->data['sub_manu'] = 'Users';
    	$this->data['tab_menu'] = '';
    }
    public function setSuccessMessage($message)
        {
            session()->flash('message',$message);
            session()->flash('type','success');
        }
        public function setErrorMessage($message)
        {
            session()->flash('message',$message);
            session()->flash('type','error');
        }
}
