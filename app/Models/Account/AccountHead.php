<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AccountHead extends Model
{
    use HasFactory;

    function transaction(){
        return $this->belongsTo(AccountTransaction::class,'opening_id');
    }
}
