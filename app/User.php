<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;
class User extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','group_id','admin_id','address',
    ];

    public function group()
    {
    	return $this->belongsTo(Group::class,'group_id','id');
    }
    public function admin()
    {
    	return $this->belongsTo(Admin::class,'admin_id','id');
    }
    public function sales()
    {
    	return $this->hasMany(SaleInvoice::class);
    }
    public function purchases()
    {
    	return $this->hasMany(PurchaseInvoice::class);
    }
    public function payments()
    {
    	return $this->hasMany(Payment::class);
    }
    public function receipts()
    {
    	return $this->hasMany(Receipt::class);
    }
    
}	 