<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PaymentMethod extends Model
{
    use HasFactory;
    public function withdraw(){
        return $this->hasMany('App\Models\Withdraw', 'method_id');
    }
    public function order(){
        return $this->hasMany('App\Models\Order', 'payment_method');
    }
    public function account(){
        return $this->belongsTo(AccountHead::class,'account_id','id');
    }

}
