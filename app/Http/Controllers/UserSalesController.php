<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SaleInvoice;
use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\InvoiceProductRequest;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\SaleItem;

class UserSalesController extends Controller
{
    public function index( $id )
    {
        $this->data['user'] 	= User::findOrFail($id);
        $this->data['tab_menu'] = 'sales';
        return view('user.sales.sales', $this->data);
    }

    public function createInvoice(InvoiceRequest $request, $usr_id)
    {
        $formData 				= $request->all();
        $formData['user_id'] 	= $usr_id;
        $formData['admin_id'] 	= Auth::id();
        $invoice = SaleInvoice::create($formData);
        if($invoice){
            //$this->setSuccessMessage('Invoice Added Successfully!');
            // return redirect()->back();
            return redirect()->route('user.sales.invoice_details', ['id' => $usr_id,'invoice_id' => $invoice->id]);
        }
    }
    public function invoice($user_id, $invoice_id)
    {
        $this->data['tab_menu'] = 'sales';
        $this->data['user']         = User::findOrFail($user_id);
        $this->data['invoice']      = SaleInvoice::findOrFail($invoice_id);
        $this->data['products']     = Product::latest()->get();
        // return $this->data['invoice']->items;
        return view('user.sales.invoice', $this->data);
    }


    public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id)
    {

        $formData = $request->all();
        $formData['sale_invoice_id'] = $invoice_id;

        if( SaleItem::create($formData) ) {
            $this->setSuccessMessage('Product Added Successfully!');
        }

        return redirect()->route( 'user.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }
    public function destroy($user_id, $invoice_id)
    {
        if( SaleInvoice::destroy($invoice_id) ) {
            $this->setSuccessMessage('Invoice Deleted Successfully!');
            return redirect()->route( 'user.sales', ['id' => $user_id] );
        }
    }
    public function destroyItem($user_id, $invoice_id, $item_id)
    {
        if( SaleItem::destroy( $item_id ) ) {
            $this->setSuccessMessage('Item Deleted Successfully!');
        }
        return redirect()->back();
        // return redirect()->route( 'user.sales.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id] );
    }
}
