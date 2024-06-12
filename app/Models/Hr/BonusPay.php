<?php

namespace App\Models\Hr;

use App\Models\Account\BalanceAccount;
use App\Models\Account\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class BonusPay extends Model
{
    use HasFactory;
    function employee(){
        return $this->belongsTo(User::class,'empID');
    }
    function bank_account(){
        return $this->belongsTo(BalanceAccount::class,'balance_account_id');
    }
    function method(){
        return $this->belongsTo(PaymentMethod::class,'paidMethod');
    }
}
