<?php

namespace App\Models\Hr;

use App\Models\Account\BalanceAccount;
use App\Models\Account\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpLoan extends Model
{
    use HasFactory;
    function employee(){
        return $this->belongsTo(Employee::class,'empID');
    }
    function method(){
        return $this->belongsTo(PaymentMethod::class,'method_id');
    }
    function bank_account(){
        return $this->belongsTo(BalanceAccount::class,'balance_account_id');
    }
}
