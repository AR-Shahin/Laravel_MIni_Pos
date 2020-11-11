<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\SaleItem;
use App\PurchaseItems;
use App\Receipt;
use App\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_menu'] = 'Dashboard';
    }
    public function index(){
        $this->data['TotalUsers'] 		= User::count('id');
        $this->data['TotalProducts'] 	= Product::count('id');
        $this->data['totalSales'] 		= SaleItem::sum('total');
        $this->data['totalPurchases'] 	= PurchaseItems::sum('total');
        $this->data['totalReceipts'] 	= Receipt::sum('amount');
        $this->data['totalPayments'] 	= Payment::sum('amount');
        $this->data['totalStock'] 		= PurchaseItems::sum('quantity') - SaleItem::sum('quantity');
        return view('dashboard',$this->data);
    }
}
