<?php

namespace App\Http\Controllers;

use App\Payment;
use App\PurchaseItems;
use App\Receipt;
use App\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function view;
use App\User;
class UserReportsController extends Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->data['sub_menu'] = 'Users';
    }
    public function index($id){

        $this->data['tab_menu'] = 'reports';
        $this->data['user'] 	= User::findOrFail($id);

        $this->data['sales'] = SaleItem::select('products.title',DB::raw('sum(sale_items.quantity)as quantity, avg(sale_items.price) as price , sum(sale_items.total) as total'))
            ->join('products', 'sale_items.product_id', '=', 'products.id')
            ->join('sale_invoices', 'sale_items.sale_invoice_id', '=', 'sale_invoices.id')
            ->where('products.status', 1)
            ->where('sale_invoices.user_id', $id)
            ->groupBy(['products.id', 'products.title'])
            ->get();

        $this->data['purchases'] = PurchaseItems::select('products.title',DB::raw('sum(purchase_items.quantity)as quantity, avg(purchase_items.price) as price , sum(purchase_items.total) as total'))
            ->join('products', 'purchase_items.product_id', '=', 'products.id')
            ->join('purchase_invoices', 'purchase_items.purchase_invoice_id', '=', 'purchase_invoices.id')
            ->where('products.status', 1)
            ->where('purchase_invoices.user_id', $id)
            ->groupBy(['products.id', 'products.title'])
            ->get();

        $this->data['receipts'] = Receipt::select('date',DB::raw('sum(amount) as total'))
            ->groupBy('date')
            ->where('user_id','=',$id)
            ->get();
        $this->data['payments'] = Payment::select('date',DB::raw('sum(amount) as total'))
            ->groupBy('date')
            ->where('user_id','=',$id)
            ->get();
        return view('user.reports.index', $this->data);
    }
}

