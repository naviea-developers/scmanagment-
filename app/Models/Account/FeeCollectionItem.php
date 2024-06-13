<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fee;
class FeeCollectionItem extends Model
{
    use HasFactory;
    function fee(){
        return $this->belongsTo(Fee::class,'fee_id');
    }
}
