<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable=['admin_id','user_id','amount','date','note','sale_invoice_id'];

    public function invoice(){
        return $this->belongsTo(SaleInvoice::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
