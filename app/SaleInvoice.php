<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    protected $fillable=['admin_id','user_id','challan_no','date','note'];
    
    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
}
