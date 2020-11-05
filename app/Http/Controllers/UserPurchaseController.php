<?php

namespace App\Http\Controllers;

use App\PurchaseInvoice;
use App\PurchaseItems;
use Illuminate\Http\Request;
use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\InvoiceProductRequest;
use App\User;
use App\Product;
use Illuminate\Support\Facades\Auth;
use function redirect;

class UserPurchaseController extends Controller
{
    public function  __construct()
    {
        $this->data['main_menu'] = 'Users';
        $this->data['sub_menu'] = 'Users';
        $this->data['tab_menu'] = 'purchases';
    }
    public function index( $id )
    {
        $this->data['user'] 	= User::findOrFail($id);
        //$this->data['tab_menu'] = 'purchase';
        return view('user.purchase.purchase', $this->data);
    }

    public function createInvoice(InvoiceRequest $request, $usr_id)
    {
        $formData 				= $request->all();
        $formData['user_id'] 	= $usr_id;
        $formData['admin_id'] 	= Auth::id();
        $invoice = PurchaseInvoice::create($formData);
        if($invoice){
            //$this->setSuccessMessage('Invoice Added Successfully!');
            // return redirect()->back();
            return redirect()->route('user.purchase.invoice_details', ['id' => $usr_id,'invoice_id' => $invoice->id]);
        }
    }

    public function invoice($user_id, $invoice_id)
    {
        $this->data['tab_menu'] = 'purchase';
        $this->data['user']         = User::findOrFail($user_id);
        $this->data['invoice']      = PurchaseInvoice::findOrFail($invoice_id);
        $this->data['products']     = Product::latest()->get();
        // return $this->data['invoice']->items;
        return view('user.purchase.invoice', $this->data);
    }
    public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id)
    {
        $formData = $request->all();
        $formData['purchase_invoice_id'] = $invoice_id;
        if( PurchaseItems::create($formData) ) {
            $this->setSuccessMessage('Product Added Successfully!');
        }
        // return redirect()->back();
        return redirect()->route( 'user.purchase.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }
    public function destroy($user_id, $invoice_id)
    {
        if( PurchaseInvoice::destroy($invoice_id) ) {
            $this->setSuccessMessage('Invoice Deleted Successfully!');
            return redirect()->route( 'user.purchase', ['id' => $user_id] );
        }
    }
    public function destroyItem($user_id, $invoice_id, $item_id)
    {
        if( PurchaseItems::destroy( $item_id ) ) {
            $this->setSuccessMessage('Item Deleted Successfully!');
        }
        return redirect()->back();
        // return redirect()->route( 'user.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }
}
