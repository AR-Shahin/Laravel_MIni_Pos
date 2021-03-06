<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use App\User;
use App\Payment;
use Illuminate\Support\Facades\Auth;
class UserPaymentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_menu'] = 'Users';
        $this->data['sub_menu'] = 'Users';
    }
    public function index( $id )
    {
        $this->data['user'] 	= User::orderBy('id','desc')->findOrFail($id);
        $this->data['tab_menu'] = 'payment';
        return view('user.payment.payment', $this->data);
    }


    public function store(PaymentRequest $request, $usr_id,$payment_id = null)
    {
        if($payment_id){

        }else{

        }
        $payment = new Payment();
        $payment->admin_id = Auth::id();
        $payment->user_id = $usr_id;
        $payment->amount = $request->amount;
        $payment->date = $request->date;
        $payment->note = $request->note;
        if($payment_id){
            $payment->purchase_invoice_id = $payment_id;
        }
        if($payment->save()){
            if($payment_id){
                $this->setSuccessMessage('Payment Added Successfully!');
                return redirect()->back();
            }else{
                $this->setSuccessMessage('Payment Added Successfully!');
                // return redirect()->back();
                return redirect()->route('user.payment', ['id' => $usr_id]);
            }
        }
    }
    public function destroy($usr_id,$py_id){
        if(Payment::find($py_id)->delete()){
            $this->setSuccessMessage('Payment Deleted Successfully!');
            return redirect()->route('user.payment', ['id' => $usr_id]);
        }
    }
}
