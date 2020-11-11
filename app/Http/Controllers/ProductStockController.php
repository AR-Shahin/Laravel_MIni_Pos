<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use function view;

class ProductStockController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Products';
        $this->data['sub_menu'] = 'Stock';
    }

    public function index(){
        $this->data['products'] = Product::where('status',1)->latest()->get();
        return view('product.stock',$this->data);
    }
}
