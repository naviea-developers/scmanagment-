<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Model;

class EmpBankAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'empID','bankID','acName','branchName','acType','acNumber','routingNumber'
    ];
    public function employee(){
        return $this->belongsTo(Employee::class,'empID','id');
    }
    function bank(){
        return $this->belongsTo(Bank::class,'bankID','id');
    }
}
