<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;

    public function direction(){
        return $this->belongsTo(Direction::class,"direction_id",'id');
    }
}
