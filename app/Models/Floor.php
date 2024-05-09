<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    public function bulding(){
        return $this->belongsTo(Bulding::class,"bulding_id",'id');
    }
}