<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoutine extends Model
{
    use HasFactory;

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }

    public function session(){
        return $this->belongsTo(Session::class,"session_id",'id');
    }

    public function class_routine_items(){
        return $this->hasMany(ClassRoutineItem::class,"class_routine_id",'id');
    }

    
}
