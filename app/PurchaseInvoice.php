<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
     protected $fillable=['admin_id','user_id','challan_no','date','note'];

     public function items(){
         return $this->hasMany(PurchaseItems::class);
     }

     public function payments(){
         return $this->hasMany(Payment::class);
     }

}
