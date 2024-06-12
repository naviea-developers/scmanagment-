<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AccountTransaction extends Model
{
    use HasFactory;
    function expense(){
        return $this->belongsTo(Expense::class,"relation_id",'id');
    }
    function account(){
        return $this->belongsTo(AccountHead::class,'account_id','id');
    }
}
