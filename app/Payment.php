<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=['admin_id','user_id','amount','date','note'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
 	 	 	 	 