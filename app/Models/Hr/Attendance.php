<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Attendance extends Model
{
    use HasFactory;
    function shift(){
        return $this->belongsTo(Shift::class,"shiftID");
    }
    function employee(){
        return $this->belongsTo(User::class,"empID");
    }
}
