<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }
    public function batchDay(){
        return $this->hasMany(BatchDay::class,"batch_id",'id');
    }
}
