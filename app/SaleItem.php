<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $fillable = ['product_id','sale_invoice_id','quantity','price','total','profit'];
   public function invoice(){
       return $this->belongsTo(SaleInvoice::class);
   }
   public function product()
   {
       return $this->belongsTo(Product::class);
   }
}
