<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
class LeaveApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'empDeptID','empDesigID','empID','leaveTypeID','leavePartID','fromDate','toDate','purpose','address','dcEmpDeptID','dcEmpDesigID','dcEmpID','leaveDay','status'
    ];

    function employee(){
        return $this->belongsTo(User::class,'empID');
    }
}
