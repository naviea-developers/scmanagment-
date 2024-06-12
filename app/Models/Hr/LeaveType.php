<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class LeaveType extends Model
{
    use HasFactory;
    protected $fillable = [
        'leaveCode','description','day','hour'
    ];
}
