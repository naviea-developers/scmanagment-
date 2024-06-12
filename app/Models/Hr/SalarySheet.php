<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class SalarySheet extends Model
{
    use HasFactory;
    function employee(){
        return $this->belongsTo(User::class,'empID','id');
    }
}
