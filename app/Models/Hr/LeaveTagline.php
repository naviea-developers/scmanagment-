<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class LeaveTagline extends Model
{
    use HasFactory;
    protected $table = "leave_taglines";
   protected $fillable = [
        'leaveTypeID','leavePartID'
    ];
    function leaveType(){
        return $this->belongsTo(LeaveType::class,'leaveTypeID','id');
    }
    function leavePart(){
        return $this->belongsTo(LeavePart::class,'leavePartID','id');
    }
}
