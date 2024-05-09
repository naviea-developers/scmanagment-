<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function bulding(){
        return $this->belongsTo(Bulding::class,"bulding_id",'id');
    }

    public function floor(){
        return $this->belongsTo(Floor::class,"floor_id",'id');
    }
}
