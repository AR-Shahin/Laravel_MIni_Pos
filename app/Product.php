<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['cat_id','title','description','unit','price','cost_price','status'];

    public function category(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
    public function purchaseItems(){
        return $this->hasMany(PurchaseItems::class);
    }
}

 	 	 	 	 	 