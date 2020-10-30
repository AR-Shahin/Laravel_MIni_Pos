<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\ReceiptRequest;
use App\Receipt;
use Illuminate\Support\Facades\Auth;
class UserReceiptController extends Controller
{
    public function index( $id )
    {
        $this->data['user'] 	= User::findOrFail($id);
        $this->data['tab_menu'] = 'receipt';
    	return view('user.receipt.receipt', $this->data);
    }

    
    public function store(ReceiptRequest $request, $usr_id)
    {
        $receipt = new Receipt();
        $receipt->admin_id = Auth::id();
        $receipt->user_id = $usr_id;
        $receipt->amount = $request->amount;
        $receipt->date = $request->date;
        $receipt->note = $request->note;
        if($receipt->save()){
            $this->setSuccessMessage('Receipt Added Successfully!');
           // return redirect()->back();
            return redirect()->route('user.receipt', ['id' => $usr_id]);
        }
    }
    public function destroy($usr_id,$rc_id){
        if(Receipt::find($rc_id)->delete()){
            $this->setSuccessMessage('Receipt Deleted Successfully!');
            return redirect()->route('user.receipt', ['id' => $usr_id]);
        }
    }
}