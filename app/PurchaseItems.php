<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseItems extends Model
{
    protected $fillable = ['product_id','purchase_invoice_id','quantity','price','total'];
    public function invoice(){
        return $this->belongsTo(PurchaseInvoice::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
