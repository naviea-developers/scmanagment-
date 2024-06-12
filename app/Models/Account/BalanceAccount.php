<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceAccount extends Model
{
    use HasFactory;

    public function paymentmethod(){
        return $this->belongsTo('App\Models\Account\PaymentMethod', 'method_id');
    }
    function account(){
        return $this->belongsTo(AccountHead::class,'account_head_id');
    }

}
