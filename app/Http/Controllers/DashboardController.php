<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\SaleItem;
use App\PurchaseItems;
use App\Receipt;
use App\Payment;
use function array_sum;
use function count_chars;
use Illuminate\Http\Request;
use function printTable;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_menu'] = 'Dashboard';
    }
    public function index(){
        $stocks = PurchaseItems::select('purchase_items.quantity')
            ->join('products','purchase_items.product_id' , '=','products.id')
            ->where('products.status',1)
            ->get();
        $total  = 0;
        foreach ($stocks as $s){
            $total += $s->quantity;
        }

        $this->data['TotalUsers'] 		= User::count('id');
        $this->data['TotalProducts'] 	= Product::count('id');
        $this->data['totalSales'] 		= SaleItem::sum('total');
        $this->data['totalPurchases'] 	= PurchaseItems::sum('total');
        $this->data['totalReceipts'] 	= Receipt::sum('amount');
        $this->data['totalPayments'] 	= Payment::sum('amount');
        $this->data['totalReceible'] 	= $this->data['totalSales'] - $this->data['totalReceipts'];
        $this->data['totalDue'] 	= $this->data['totalPurchases'] - $this->data['totalPayments'] ;
        $this->data['totalProfits'] 	= SaleItem::sum('profit');
       // $this->data['totalStock'] 		= PurchaseItems::sum('quantity') - SaleItem::sum('quantity');
        $this->data['totalStock'] 		= $total - SaleItem::sum('quantity');

        return view('dashboard',$this->data);
    }
}
