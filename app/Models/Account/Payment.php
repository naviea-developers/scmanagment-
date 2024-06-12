<?php

namespace App\Models\Account;

use App\Models\Account\BalanceAccount;
use App\Models\Account\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Payment extends Model
{
    use HasFactory;
    function method(){
        return $this->belongsTo(PaymentMethod::class,'payment_method');
    }
    function account(){
        return $this->belongsTo(BalanceAccount::class,'bank_account_id');
    }
}
