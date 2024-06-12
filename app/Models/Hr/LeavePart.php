<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class LeavePart extends Model
{
    use HasFactory;
    protected $fillable = [
        'levaePartName','day'
    ];
}
