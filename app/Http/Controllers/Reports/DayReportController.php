<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function view;
use App\PurchaseItems;
use App\Receipt;
use App\Payment;

class DayReportController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu'] = 'Reports';
    }

    public function index(Request $request){
        $this->data['start_date'] = $request->get('start_date',date('Y-m-d'));
        $this->data['end_date'] = $request->get('end_date',date('Y-m-d'));

        //sales
        $this->data['sales'] = SaleItem::select('products.title',DB::raw('SUM(sale_items.quantity) as quantity, AVG(sale_items.price) AS price, SUM(sale_items.total) as total'))
            ->join('products','sale_items.product_id','=','products.id')
            ->join('sale_invoices', 'sale_items.sale_invoice_id', '=', 'sale_invoices.id')
            ->whereBetween('sale_invoices.date', [ $this->data['start_date'], $this->data['end_date'] ])
            ->where('products.status', 1)
            ->groupBy(['products.id', 'products.title'])
            ->orderBy('sale_items.id','desc')
            ->get();
        //purchase
        $this->data['purchases'] = PurchaseItems::select( 'products.title', DB::raw( 'SUM(purchase_items.quantity) as quantity, AVG(purchase_items.price) AS price, SUM(purchase_items.total) as total') )
            ->join('products', 'purchase_items.product_id', '=', 'products.id')
            ->join('purchase_invoices', 'purchase_items.purchase_invoice_id', '=', 'purchase_invoices.id')
            ->whereBetween('purchase_invoices.date', [ $this->data['start_date'], $this->data['end_date'] ])
            ->where('products.status', 1)
            ->groupBy(['products.id', 'products.title'])
            ->get();
//receipts
        $this->data['receipts'] = Receipt::select('users.name', 'users.phone', DB::raw('SUM(receipts.amount) as amount') )
            ->join('users', 'receipts.user_id', '=', 'users.id')
            ->whereBetween('date', [ $this->data['start_date'], $this->data['end_date'] ])
            ->groupBy(['user_id', 'users.name', 'users.phone'])
            ->get();
//payments
        $this->data['payments'] = Payment::select('users.name', 'users.phone', DB::raw('SUM(payments.amount) as amount') )
            ->join('users', 'payments.user_id', '=', 'users.id')
            ->whereBetween('date', [ $this->data['start_date'], $this->data['end_date'] ])
            ->groupBy(['user_id', 'users.name', 'users.phone'])
            ->orderBy('users.id','desc')
            ->get();


        return view('reports.days',$this->data);
    }
}



