<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    
    public function teacher(){
        return $this->belongsTo(User::class,"class_teacher_id",'id');
    }
}