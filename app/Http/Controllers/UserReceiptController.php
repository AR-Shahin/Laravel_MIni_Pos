<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\ReceiptRequest;
use App\Receipt;
use Illuminate\Support\Facades\Auth;
class UserReceiptController extends Controller
{
    public function  __construct()
    {
        parent::__construct();
        // $this->data['main_menu'] = 'Users';
        $this->data['sub_menu'] = 'Users';
        $this->data['tab_menu'] = 'receipt';
    }
    public function index( $id )
    {
        $this->data['user'] 	= User::findOrFail($id);
    	return view('user.receipt.receipt', $this->data);
    }

    
    public function store(ReceiptRequest $request, $usr_id,$receipt_id = null)
    {
        $receipt = new Receipt();
        $receipt->admin_id = Auth::id();
        $receipt->user_id = $usr_id;
        $receipt->amount = $request->amount;
        $receipt->date = $request->date;
        $receipt->note = $request->note;
        if($receipt_id){
            $receipt->sale_invoice_id = $receipt_id;
        }
        if($receipt->save()){
            $this->setSuccessMessage('Receipt Added Successfully!');
            if($receipt_id){
                return redirect()->back();
            }else{
                return redirect()->route('user.receipt', ['id' => $usr_id]);
            }
           // return redirect()->back();
        }
    }
    public function destroy($usr_id,$rc_id){
        if(Receipt::find($rc_id)->delete()){
            $this->setSuccessMessage('Receipt Deleted Successfully!');
            return redirect()->route('user.receipt', ['id' => $usr_id]);
        }
    }
}
